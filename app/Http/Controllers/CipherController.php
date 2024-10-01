<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cipher;

class CipherController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_alphabet' => 'required|array',
            'capital_alphabet' => 'required|array',
            'rgb_values' => 'required|string',
        ]);

        $cipher = Cipher::create([
            'name' => $request->name,
            'small_alphabet' => json_encode($request->small_alphabet),
            'capital_alphabet' => json_encode($request->capital_alphabet),
            'rgb_values' => $request->rgb_values,
        ]);

        return response()->json($cipher, 201);
    }
}
