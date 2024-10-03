<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cipher;
use App\CipherSetting;
use Auth;

class FrontController extends Controller
{
    public function about ()
    {
        return view('about');
    }
    public function bible_search ()
    {
        return view('bible-search');
    }
    public function blog ()
    {
        return view('blog');
    }
    public function blog_detail ()
    {
        return view('blog-detail');
    }
    public function calculator ()
    {

        if (!session()->has('temp_id')) {
            session(['temp_id' => uniqid('temp_', true)]);
        }
        $user_id = Auth::check() ? Auth::user()->id : session('temp_id');

        $staticCiphers = [
            [
                "id" => 'D0',
                "name" => "Ordinal",
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"10","k":"11","l":"12","m":"13","n":"14","o":"15","p":"16","q":"17","r":"18","s":"19","t":"20","u":"21","v":"22","w":"23","x":"24","y":"25","z":"26"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"0","green":"186","blue":"0"}',
                "prority" => 0,
            ],
            [
                "id" => 'D1',
                "name" => "Reduction",
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"10","k":"11","l":"12","m":"13","n":"14","o":"15","p":"16","q":"17","r":"18","s":"19","t":"20","u":"21","v":"22","w":"23","x":"24","y":"25","z":"26"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"88","green":"125","blue":"245"}',
                "prority" => 0,
            ],
            [
                "id" => 'D2',
                "name" => "Reverse",
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"10","k":"11","l":"12","m":"13","n":"14","o":"15","p":"16","q":"17","r":"18","s":"19","t":"20","u":"21","v":"22","w":"23","x":"24","y":"25","z":"26"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"80","green":"235","blue":"21"}',
                "prority" => 0,
            ],
            [
                "id" => 'D3',
                "name" => "Reverse Reduction",
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"10","k":"11","l":"12","m":"13","n":"14","o":"15","p":"16","q":"17","r":"18","s":"19","t":"20","u":"21","v":"22","w":"23","x":"24","y":"25","z":"26"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"100","green":"226","blue":"226"}',
                "prority" => 0,
            ]
        ];

        // All Ciphers
        $ci_settings = CipherSetting::where('user_id', $user_id)->get();

        $updatedCiphers = $staticCiphers;

        foreach ($ci_settings as $setting) {
            foreach ($updatedCiphers as &$cipher) {
                if ($cipher['id'] == $setting['cipher_id']) {
                    $cipher['ci_settings'] = $setting;  // Add the ci_settings array to the cipher
                }
            }
        }

        $ciphers_temp1 = Cipher::with('ci_settings')->get();
        $ciphersFromDBArray = $ciphers_temp1->toArray();
        $ciphersAll = array_merge($updatedCiphers, $ciphersFromDBArray);

        // Filter cipher status 1
        $filteredStaticCiphers = array_filter($staticCiphers, function ($cipher) use ($user_id) {
            return CipherSetting::where('user_id', $user_id)
                                ->where('cipher_id', $cipher['id'])
                                ->where('status', 1)
                                ->exists();
        });

        $ciphers_temp2 = Cipher::whereHas('cipherSettings', function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->where('status', 1);
            })->get();
        $ciphersFromDBArray = $ciphers_temp2->toArray();
        $ciphers = array_merge($filteredStaticCiphers, $ciphersFromDBArray);
        $first_ciphers = $ciphers[0];
        // $userCiphers = CipherSetting::where('user_id', $user_id)->get();
        // $userCipherStatuses = $userCiphers->pluck('status', 'cipher_id')->toArray();
        return view('calculator', compact('ciphers', 'ciphersAll', 'first_ciphers'));
    }
    public function calendar ()
    {
        return view('calendar');
    }
    public function contact ()
    {
        return view('contact');
    }
    public function custom_ciphers ()
    {
        return view('custom-ciphers');
    }
    public function date_calculator ()
    {
        return view('date-calculator');
    }
    public function faq ()
    {
        return view('faq');
    }
    public function greek_calculator ()
    {
        return view('greek-calculator');
    }
    public function hebrew_calculator ()
    {
        return view('hebrew-calculator');
    }
    public function memberships ()
    {
        return view('memberships');
    }
    public function monthly_calendar ()
    {
        return view('monthly-calendar');
    }
    public function nostalgia_calculators ()
    {
        return view('nostalgia-calculators');
    }
    public function nostalgia_calculators_basic ()
    {
        return view('nostalgia-calculators-basic');
    }
    public function nostalgia_calculators_classic ()
    {
        return view('nostalgia-calculators-classic');
    }
    public function nostalgia_calculators_date ()
    {
        return view('nostalgia-calculators-date');
    }
    public function nostalgia_calculators_nextgen ()
    {
        return view('nostalgia-calculators-nextgen');
    }
    public function number_properties ()
    {
        return view('number-properties');
    }
    public function product_detail ()
    {
        return view('product-detail');
    }
    public function shop ()
    {
        return view('shop');
    }
}
