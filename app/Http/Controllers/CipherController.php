<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cipher;

class CipherController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_alphabet' => 'required|array',
            'capital_alphabet' => 'required|array',
            'rgb_values' => 'required',
        ]);

        $existingCipher = Cipher::where('name', $request->name)->first();
        if ($existingCipher) {
            return response()->json(['error'=> true,'message' => 'A cipher with this name already exists.'], 409); // 409 Conflict
        }

        $prority = Cipher::max('prority') + 1;

        $chipers = Cipher::create([
            'name' => $request->name,
            'small_alphabet' => json_encode($request->small_alphabet),
            'capital_alphabet' => json_encode($request->capital_alphabet),
            'rgb_values' => json_encode($request->rgb_values),
            'prority' => $prority,
        ]);

        return response()->json(['success'=> true,'message' => 'Cipher added successfully!'], 201);
    }

    public function index()
    {
        $ciphers = Cipher::orderBy('prority', 'ASC')->get();
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
            'rgb_values' => json_decode($cipher->rgb_values)
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
            return response()->json(['success' => true, 'message' => 'Cipher deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Failed to delete cipher. Please try again.'], 500);
        }
    }

}
