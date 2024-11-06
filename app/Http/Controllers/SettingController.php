<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Setting;

class SettingController extends Controller
{
    public function matrix_rainbow(Request $request)
    {
        $value = $request->input('value');

        Setting::updateOrCreate(
            ['user_id' => Auth::user()->id, 'key' => 'matrix_rainbow'],
            ['value' => $value]
        );

        return response()->json(['status' => 'success']);
    }
}
