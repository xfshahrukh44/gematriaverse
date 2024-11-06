<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cipher;
use App\CipherSetting;
use App\User;
use Illuminate\Support\Facades\File;
use Auth;

class CipherController extends Controller
{
    protected $subscriptions;

    public function __construct()
    {
        $path = public_path('subscriptions.json');
        $json = File::get($path);
        $this->subscriptions = json_decode($json, true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_alphabet' => 'required|array',
            'capital_alphabet' => 'required|array',
            'rgb_values' => 'required',
            'description' => 'nullable',
        ]);

        $existingCipher = Cipher::where('name', $request->name)->first();
        if ($existingCipher) {
            return response()->json(['error'=> true,'message' => 'A cipher with this name already exists.'], 409); // 409 Conflict
        }

        $plan = Auth::user()->plan ?? 'free';
        $cipher_count_user = Cipher::where('user_id', Auth::user()->id)->count();
        $limit = $this->subscriptions['subscriptions'][$plan]['features']['custom_ciphers']['limit'];
        if($limit == $cipher_count_user){
            return response()->json(['error'=> true, 'message' => 'The custom cipher limit has been reached.'], 409);
        }

        $prority = Cipher::max('prority') + 1;

        $chipers = Cipher::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'small_alphabet' => json_encode($request->small_alphabet),
            'capital_alphabet' => json_encode($request->capital_alphabet),
            'rgb_values' => json_encode($request->rgb_values),
            'prority' => $prority,
            'description' => $request->description,
        ]);

        // $user = Auth::user();
        // $user->cipher_count += 1;
        // $user->save();

        return response()->json(['success'=> true,'message' => 'Cipher added successfully!'], 201);

    }

    public function index()
    {
        $ciphers = Cipher::orderBy('prority', 'ASC')->where('user_id', Auth::user()->id)->get();
        return response()->json($ciphers);
    }

    public function moveUp(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ciphers,id'
        ]);

        $cipher = Cipher::find($request->id);
        $currentPriority = $cipher->prority;
        $previousCipher = Cipher::where('prority', $currentPriority - 1)->first();

        if ($previousCipher) {
            $cipher->prority = $currentPriority - 1;
            $previousCipher->prority = $currentPriority;

            $cipher->save();
            $previousCipher->save();

            return response()->json(['success' => true, 'message' => 'Cipher moved up successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Cipher is already at the top.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_alphabet' => 'required|array',
            'capital_alphabet' => 'required|array',
            'rgb_values' => 'required',
            'description' => 'nullable',
        ]);

        $cipher = Cipher::find($id);
        if (!$cipher) {
            return response()->json(['error' => true, 'message' => 'Cipher not found.'], 404);
        }

        if ($cipher->name !== $request->name) {
            $existingCipher = Cipher::where('name', $request->name)->first();
            if ($existingCipher) {
                return response()->json(['error' => true, 'message' => 'A cipher with this name already exists.'], 409);
            }
        }

        $cipher->name = $request->name;
        $cipher->small_alphabet = json_encode($request->small_alphabet);
        $cipher->capital_alphabet = json_encode($request->capital_alphabet);
        $cipher->rgb_values = json_encode($request->rgb_values);
        $cipher->description = $request->description;
        $cipher->save();

        return response()->json(['success' => true, 'message' => 'Cipher updated successfully!'], 200);
    }

    public function show($id)
    {
        $cipher = Cipher::find($id);
        if(!$cipher){
            return response()->json(['success' => false, 'message' => 'Cipher not found.'], 404);
        }
        $data = [
            'id' => $cipher->id,
            'name' => $cipher->name,
            'small_alphabet' => json_decode($cipher->small_alphabet),
            'capital_alphabet' => json_decode($cipher->capital_alphabet),
            'rgb_values' => json_decode($cipher->rgb_values),
            'description' => $cipher->description
        ];
        return response()->json(['success' => true, 'message' => 'Cipher updated successfully!', 'cipher' => $data], 200);
    }

    public function destroy($id)
    {
        $cipher = Cipher::find($id);
        if (!$cipher) {
            return response()->json(['error' => true, 'message' => 'Cipher not found.'], 404);
        }

        try {
            $cipher->delete();

            // $user = Auth::user();
            // $user->cipher_count -= 1;
            // $user->save();
            return response()->json(['success' => true, 'message' => 'Cipher deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Failed to delete cipher. Please try again.'], 500);
        }
    }

    public function saveCipherSettings(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'ciphers' => 'required|array',
        ]);

        $user_id = $request->input('user_id');
        $ciphers = $request->input('ciphers');
        $excludedCiphers = ['D0', 'D1', 'D2', 'D3'];

        foreach ($ciphers as $cipher) {
            $cipher_id = $cipher['cipher_id'];
            $status = $cipher['status'];

            if (!in_array($cipher_id, $excludedCiphers)) {
                $existingSetting = CipherSetting::where('user_id', $user_id)
                    ->where('cipher_id', $cipher_id)
                    ->first();

                if ($existingSetting) {
                    $existingSetting->update(['status' => $status]);
                } else {
                    CipherSetting::create([
                        'user_id' => $user_id,
                        'cipher_id' => $cipher_id,
                        'status' => $status,
                    ]);
                }
            } else {
                $existingSetting = CipherSetting::where('user_id', $user_id)
                    ->where('cipher_id', $cipher_id)
                    ->first();

                if ($existingSetting) {
                    $existingSetting->update(['status' => $status]);
                } else {
                    CipherSetting::create([
                        'user_id' => $user_id,
                        'cipher_id' => $cipher_id,
                        'status' => $status,
                    ]);
                }
            }
        }
        return response()->json(['success' => true]);
    }

    public function changeCiphers(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'cipher_id' => 'required',
            'status' => 'required',
        ]);

        $user_id = $request->input('user_id');
        $cipher_id = $request->input('cipher_id');
        $status = $request->input('status');
        $excludedCiphers = ['D0', 'D1', 'D2', 'D3'];

        if (!in_array($cipher_id, $excludedCiphers)) {
            $existingSetting = CipherSetting::where('user_id', $user_id)
                ->where('cipher_id', $cipher_id)
                ->first();

            if ($existingSetting) {
                $existingSetting->update(['status' => $status]);
            } else {
                CipherSetting::create([
                    'user_id' => $user_id,
                    'cipher_id' => $cipher_id,
                    'status' => $status,
                ]);
            }
        } else {
            $existingSetting = CipherSetting::where('user_id', $user_id)
                ->where('cipher_id', $cipher_id)
                ->first();

            if ($existingSetting) {
                $existingSetting->update(['status' => $status]);
            } else {
                CipherSetting::create([
                    'user_id' => $user_id,
                    'cipher_id' => $cipher_id,
                    'status' => $status,
                ]);
            }
        }

        return response()->json(['success' => true]);
    }
}
