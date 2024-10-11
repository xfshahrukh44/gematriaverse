<?php

namespace App\Http\Controllers;

use Auth;
use App\Faq;
use App\Cipher;
use App\CipherSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FrontController extends Controller
{

    protected $subscriptions;

    public function __construct()
    {
        $path = public_path('subscriptions.json');
        $json = File::get($path);
        $this->subscriptions = json_decode($json, true);
    }

    protected function hasAccessToFeature($feature)
    {
        $plan = Auth::user()->plan ?? 'free';

        if (isset($this->subscriptions['subscriptions'][$plan]['features'][$feature])) {
            $featureData = $this->subscriptions['subscriptions'][$plan]['features'][$feature];

            if (is_bool($featureData)) {
                return $featureData;
            }

            if (is_array($featureData)) {
                return true;
            }
        }

        return false;
    }

    public function about()
    {
        $page = DB::table('pages')->where('id', 1)->first();
        $section = DB::table('section')->where('page_id', 2)->get();
        return view('about', compact('page', 'section'));
    }
    public function bible_search()
    {
        if (!$this->hasAccessToFeature('bible_search')) {
            return view('locked', ['title' => 'Bible Search']);
        }
        $user_id = Auth::check() ? Auth::user()->id : '';

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
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"1","k":"2","l":"3","m":"4","n":"5","o":"6","p":"7","q":"8","r":"9","s":"1","t":"2","u":"3","v":"4","w":"5","x":"6","y":"7","z":"8"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"88","green":"125","blue":"245"}',
                "prority" => 0,
            ],
            [
                "id" => 'D2',
                "name" => "Reverse",
                "small_alphabet" => '{"z":"1","y":"2","x":"3","w":"4","v":"5","u":"6","t":"7","s":"8","r":"9","q":"10","p":"11","o":"12","n":"13","m":"14","l":"15","k":"16","j":"17","i":"18","h":"19","g":"20","f":"21","e":"22","d":"23","c":"24","b":"25","a":"26"}',
                "capital_alphabet" => '{"Z":"0","Y":"0","X":"0","W":"0","V":"0","U":"0","T":"0","S":"0","R":"0","Q":"0","P":"0","O":"0","N":"0","M":"0","L":"0","K":"0","J":"0","I":"0","H":"0","G":"0","F":"0","E":"0","D":"0","C":"0","B":"0","A":"0"}',
                "rgb_values" => '{"red":"80","green":"235","blue":"21"}',
                "prority" => 0,
            ],
            [
                "id" => 'D3',
                "name" => "Reverse Reduction",
                "small_alphabet" => '{"z":"1","y":"2","x":"3","w":"4","v":"5","u":"6","t":"7","s":"8","r":"9","q":"1","p":"2","o":"3","n":"4","m":"5","l":"6","k":"7","j":"8","i":"9","h":"1","g":"2","f":"3","e":"4","d":"5","c":"6","b":"7","a":"8"}',
                "capital_alphabet" => '{"Z":"0","Y":"0","X":"0","W":"0","V":"0","U":"0","T":"0","S":"0","R":"0","Q":"0","P":"0","O":"0","N":"0","M":"0","L":"0","K":"0","J":"0","I":"0","H":"0","G":"0","F":"0","E":"0","D":"0","C":"0","B":"0","A":"0"}',
                "rgb_values" => '{"red":"100","green":"226","blue":"226"}',
                "prority" => 0,
            ]
        ];

        $D0 = array_map('intval', json_decode($staticCiphers[0]['small_alphabet'], true));
        $D1 = array_map('intval', json_decode($staticCiphers[1]['small_alphabet'], true));
        $D2 = array_map('intval', json_decode($staticCiphers[2]['small_alphabet'], true));
        $D3 = array_map('intval', json_decode($staticCiphers[3]['small_alphabet'], true));

        // All Ciphers
        $tempArr = [];
        $ci_settings = CipherSetting::where('user_id', $user_id)->get();

        if ($ci_settings->isEmpty()) {  // Use isEmpty() for Eloquent collections
            $tempArr = [
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D0',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-03 16:02:02',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D1',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D2',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D3',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
            ];
        }

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
        if ($user_id == '') {
            $ciphersAll = array_merge($updatedCiphers);
        } else {
            $ciphersAll = array_merge($updatedCiphers, $ciphersFromDBArray);
        }

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
        if ($user_id == '') {
            $ciphers = array_merge($updatedCiphers);
        } else {
            $ciphers = array_merge($filteredStaticCiphers, $ciphersFromDBArray);
        }

        $first_ciphers = $ciphers[0];

        return view('bible-search', compact('ciphers', 'ciphersAll', 'first_ciphers', 'D0', 'D1', 'D2', 'D3', 'user_id'));
    }

    public function blog()
    {
        return view('blog');
    }
    public function blog_detail()
    {
        return view('blog-detail');
    }
    public function calculator()
    {
        if (!$this->hasAccessToFeature('calculators')) {
            return view('locked', ['title' => 'Calculators']);
        }
        $user_id = Auth::check() ? Auth::user()->id : '';

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
                "small_alphabet" => '{"a":"1","b":"2","c":"3","d":"4","e":"5","f":"6","g":"7","h":"8","i":"9","j":"1","k":"2","l":"3","m":"4","n":"5","o":"6","p":"7","q":"8","r":"9","s":"1","t":"2","u":"3","v":"4","w":"5","x":"6","y":"7","z":"8"}',
                "capital_alphabet" => '{"A":"0","B":"0","C":"0","D":"0","E":"0","F":"0","G":"0","H":"0","I":"0","J":"0","K":"0","L":"0","M":"0","N":"0","O":"0","P":"0","Q":"0","R":"0","S":"0","T":"0","U":"0","V":"0","W":"0","X":"0","Y":"0","Z":"0"}',
                "rgb_values" => '{"red":"88","green":"125","blue":"245"}',
                "prority" => 0,
            ],
            [
                "id" => 'D2',
                "name" => "Reverse",
                "small_alphabet" => '{"z":"1","y":"2","x":"3","w":"4","v":"5","u":"6","t":"7","s":"8","r":"9","q":"10","p":"11","o":"12","n":"13","m":"14","l":"15","k":"16","j":"17","i":"18","h":"19","g":"20","f":"21","e":"22","d":"23","c":"24","b":"25","a":"26"}',
                "capital_alphabet" => '{"Z":"0","Y":"0","X":"0","W":"0","V":"0","U":"0","T":"0","S":"0","R":"0","Q":"0","P":"0","O":"0","N":"0","M":"0","L":"0","K":"0","J":"0","I":"0","H":"0","G":"0","F":"0","E":"0","D":"0","C":"0","B":"0","A":"0"}',
                "rgb_values" => '{"red":"80","green":"235","blue":"21"}',
                "prority" => 0,
            ],
            [
                "id" => 'D3',
                "name" => "Reverse Reduction",
                "small_alphabet" => '{"z":"1","y":"2","x":"3","w":"4","v":"5","u":"6","t":"7","s":"8","r":"9","q":"1","p":"2","o":"3","n":"4","m":"5","l":"6","k":"7","j":"8","i":"9","h":"1","g":"2","f":"3","e":"4","d":"5","c":"6","b":"7","a":"8"}',
                "capital_alphabet" => '{"Z":"0","Y":"0","X":"0","W":"0","V":"0","U":"0","T":"0","S":"0","R":"0","Q":"0","P":"0","O":"0","N":"0","M":"0","L":"0","K":"0","J":"0","I":"0","H":"0","G":"0","F":"0","E":"0","D":"0","C":"0","B":"0","A":"0"}',
                "rgb_values" => '{"red":"100","green":"226","blue":"226"}',
                "prority" => 0,
            ],
            [
                "id" => 'D4',
                "name" => "Chaldean Numerology",
                "small_alphabet" => '{"a":1,"b":2,"c":3,"d":4,"e":5,"f":8,"g":3,"h":5,"i":1,"j":1,"k":2,"l":3,"m":4,"n":5,"o":7,"p":8,"q":1,"r":2,"s":3,"t":4,"u":6,"v":6,"w":6,"x":5,"y":1,"z":7}',
                "capital_alphabet" => '{"A":1,"B":2,"C":3,"D":4,"E":5,"F":8,"G":3,"H":5,"I":1,"J":1,"K":2,"L":3,"M":4,"N":5,"O":7,"P":8,"Q":1,"R":2,"S":3,"T":4,"U":6,"V":6,"W":6,"X":5,"Y":1,"Z":7}',
                "rgb_values" => '{"red":"251","green":"250","blue":"255"}',
                "prority" => 0,
            ]
        ];

        $D0 = array_map('intval', json_decode($staticCiphers[0]['small_alphabet'], true));
        $D1 = array_map('intval', json_decode($staticCiphers[1]['small_alphabet'], true));
        $D2 = array_map('intval', json_decode($staticCiphers[2]['small_alphabet'], true));
        $D3 = array_map('intval', json_decode($staticCiphers[3]['small_alphabet'], true));

        // All Ciphers
        $tempArr = [];
        $ci_settings = CipherSetting::where('user_id', $user_id)->get();

        if ($ci_settings->isEmpty()) {  // Use isEmpty() for Eloquent collections
            $tempArr = [
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D0',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-03 16:02:02',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D1',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D2',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D3',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
                [
                    'user_id' => 'temp',
                    'cipher_id' => 'D4',
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => '2024-10-02 17:19:46',
                ],
            ];
        }

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
        if ($user_id == '') {
            $ciphersAll = array_merge($updatedCiphers);
        } else {
            $ciphersAll = array_merge($updatedCiphers, $ciphersFromDBArray);
        }

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
        if ($user_id == '') {
            $ciphers = array_merge($updatedCiphers);
        } else {
            $ciphers = array_merge($filteredStaticCiphers, $ciphersFromDBArray);
        }

        $first_ciphers = $ciphers[0];

        $calculator = get_feature('calculators');
        $breakdown_screenshot = $calculator->breakdown_screenshot ?? false;

        return view('calculator', compact('ciphers', 'breakdown_screenshot', 'ciphersAll', 'first_ciphers', 'D0', 'D1', 'D2', 'D3', 'user_id'));
    }
    public function calendar()
    {
        if ($this->hasAccessToFeature('calendar')) {
            return view('calendar');
        }else{
            return view('locked', ['title' => 'Calendar']);
        }
    }
    public function contact()
    {
        $page = DB::table('pages')->where('id', 1)->first();
        $section = DB::table('section')->where('page_id', 4)->get();
        return view('contact', compact('section', 'page'));
    }
    public function custom_ciphers()
    {
        if (!$this->hasAccessToFeature('custom_ciphers')) {
            return view('locked', ['title' => 'Custom Cipher']);
        }
        return view('custom-ciphers');
    }
    public function date_calculator()
    {
        if (!can_access_feature('date_calculator')) {
            return redirect()->route('memberships')->with('error', 'You need to upgrade your plan to access this feature.');
        }

        $date_calculator = get_feature('date_calculator');
        $planetary_table = $date_calculator->planetary_table ?? false;

        return view('date-calculator', compact('planetary_table'));
    }
    public function faq(Request $request)
    {
        $page = DB::table('pages')->where('id', 1)->first();
        $section = DB::table('section')->where('page_id', 3)->get();
        $faqs = Faq::all();
        return view('faq', compact('faqs', 'section', 'page'));
    }
    public function greek_calculator()
    {
        $calculator = get_feature('calculators');
        $breakdown_screenshot = $calculator->breakdown_screenshot ?? false;

        return view('greek-calculator', compact('breakdown_screenshot'));
    }
    public function hebrew_calculator()
    {
        $calculator = get_feature('calculators');
        $breakdown_screenshot = $calculator->breakdown_screenshot ?? false;

        return view('hebrew-calculator', compact('breakdown_screenshot'));
    }
    public function memberships()
    {
        return view('memberships');
    }
    public function monthly_calendar()
    {
        return view('monthly-calendar');
    }
    public function nostalgia_calculators()
    {
        if (!$this->hasAccessToFeature('nostalgia_calculators')) {
            return view('locked', ['title' => 'Nostalgia Calculators']);
        }
        return view('nostalgia-calculators');
    }
    public function nostalgia_calculators_basic()
    {
        return view('nostalgia-calculators-basic');
    }
    public function nostalgia_calculators_classic()
    {
        return view('nostalgia-calculators-classic');
    }
    public function nostalgia_calculators_date()
    {
        return view('nostalgia-calculators-date');
    }
    public function nostalgia_calculators_nextgen()
    {
        return view('nostalgia-calculators-nextgen');
    }
    public function number_properties()
    {
        return view('number-properties');
    }
    public function product_detail()
    {
        return view('product-detail');
    }
    public function shop()
    {
        return view('shop');
    }

    public function anagramCalculator(Request $request)
    {
        return view('anagram-calculator');
    }
}
