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

        ];

        if($user_id != ''){
            $afterLoginArr = [
                [
                    "id" => 'D4',
                    "name" => "Chaldean Numerology",
                    "small_alphabet" => '{"a":1,"b":2,"c":3,"d":4,"e":5,"f":8,"g":3,"h":5,"i":1,"j":1,"k":2,"l":3,"m":4,"n":5,"o":7,"p":8,"q":1,"r":2,"s":3,"t":4,"u":6,"v":6,"w":6,"x":5,"y":1,"z":7}',
                    "capital_alphabet" => '{"A":1,"B":2,"C":3,"D":4,"E":5,"F":8,"G":3,"H":5,"I":1,"J":1,"K":2,"L":3,"M":4,"N":5,"O":7,"P":8,"Q":1,"R":2,"S":3,"T":4,"U":6,"V":6,"W":6,"X":5,"Y":1,"Z":7}',
                    "rgb_values" => '{"red":"251","green":"250","blue":"255"}',
                    "prority" => 0,
                ],
                [
                    "id" => 'D5',
                    "name" => 'Ophiuchus',
                    "small_alphabet" =>'{"z":"13","y":"12","x":"11","w":"10","v":"9","u":"8","t":"7","s":"6","r":"5","q":"4","p":"3","o":"2","n":"1","m":"13", "l":"12","k":"11","j":"10","i":"9","h":"8","g":"7","f":"6", "e":"5","d":"4","c":"3","b":"2","a":"1"}',
                    "capital_alphabet" =>'{"Z": "13", "Y": "12", "X": "11", "W": "10", "V": "9", "U": "8", "T": "7", "S": "6", "R": "5", "Q": "4", "P": "3", "O": "2", "N": "1", "M": "13", "L": "12", "K": "11", "J": "10", "I": "9", "H": "8", "G": "7", "F": "6", "E": "5", "D": "4", "C": "3", "B": "2", "A": "1"}',
                    "rgb_values" => '{"red":"255","green":"255","blue":"255"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D6',
                    "name" => 'Sumerian',
                    "small_alphabet" =>'{"a":"6", "b": "12", "c": "18", "d": "24", "e": "30", "f": "36", "g": "42", "h": "48", "i": "54", "j": "60", "k": "66", "l": "72", "m": "78", "n": "84", "o": "90", "p": "96", "q": "102", "r": "108", "s": "114", "t": "120", "u": "126", "v": "132", "w": "138", "x": "144", "y": "150", "z": "156" }',
                    "capital_alphabet" =>'{"A": "6", "B": "12", "C": "18", "D": "24", "E": "30", "F": "36", "G": "42", "H": "48", "I": "54", "J": "60", "K": "66", "L": "72", "M": "78","N": "84", "O": "90", "P": "96", "Q": "102", "R": "108", "S": "114", "T": "120", "U": "126", "V": "132", "W": "138", "X": "144", "Y": "150", "Z": "156"}',
                    "rgb_values" => '{"red":"82","green":"224","blue":"201"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D7',
                    "name" => 'Primes',
                    "small_alphabet" =>'{"a": "2", "b": "3", "c": "5", "d": "7", "e": "11", "f": "13", "g": "17", "h": "19", "i": "23", "j": "29", "k": "31", "l": "37", "m": "41","n": "43", "o": "47", "p": "53", "q": "59", "r": "61", "s": "67", "t": "71", "u": "73", "v": "79", "w": "83", "x": "89", "y": "97", "z": "101"}',
                    "capital_alphabet" =>'{"A": "2", "B": "3", "C": "5", "D": "7", "E": "11", "F": "13", "G": "17", "H": "19", "I": "23", "J": "29", "K": "31", "L": "37", "M": "41","N": "43", "O": "47", "P": "53", "Q": "59", "R": "61", "S": "67", "T": "71", "U": "73", "V": "79", "W": "83", "X": "89", "Y": "97", "Z": "101"}',
                    "rgb_values" => '{"red":"214","green":"183","blue":"113"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D8',
                    "name" => 'Primes Reduced',
                    "small_alphabet" =>'{"a":"2","b":"3","c":"5","d":"7","e":"2","f":"4","g":"8","h":"1","i":"5","j":"2","k":"4","l":"1","m":"5","n":"7","o":"2","p":"8","q":"5","r":"7","s":"4","t":"8","u":"1","v":"7","w":"2","x":"8","y":"7","z":"2"}',
                    "capital_alphabet" =>'{"A": "2","B": "3","C": "5","D": "7","E": "2","F": "4","G": "8","H": "1","I": "5","J": "2","K": "4","L": "1","M": "5","N": "7","O": "2","P": "8","Q": "5","R": "7","S": "4","T": "8","U": "1","V": "7","W": "2","X": "8","Y": "7","Z": "2"}',
                    "rgb_values" => '{"red":"214","green":"183","blue":"113"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D9',
                    "name" => 'Composite',
                    "small_alphabet" =>'{"a": "4", "b": "6", "c": "8", "d": "9", "e": "10", "f": "12", "g": "14", "h": "15","i": "16", "j": "18", "k": "20", "l": "21", "m": "22", "n": "24", "o": "25", "p": "26","q": "27", "r": "28", "s": "30", "t": "32", "u": "33", "v": "34", "w": "35", "x": "36", "y": "38", "z": "39"}',
                    "capital_alphabet" =>'{"A": "4", "B": "6", "C": "8", "D": "9", "E": "10", "F": "12", "G": "14", "H": "15", "I": "16", "J": "18","K": "20", "L": "21", "M": "22", "N": "24", "O": "25", "P": "26", "Q": "27", "R": "28", "S": "30", "T": "32","U": "33", "V": "34", "W": "35", "X": "36", "Y": "38", "Z": "39"}',
                    "rgb_values" => '{"red":"214","green":"183","blue":"113"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D10',
                    "name" => 'Composite Reduced',
                    "small_alphabet" =>'{"a": "4", "b": "6", "c": "8", "d": "9", "e": "1", "f": "3", "g": "5", "h": "6", "i": "7", "j": "9", "k": "2", "l": "3", "m": "4", "n": "6", "o": "7", "p": "8", "q": "9", "r": "1", "s": "3", "t": "5", "u": "6", "v": "7", "w": "8", "x": "9", "y": "2", "z": "3"}',
                    "capital_alphabet" =>'{"A": "4", "B": "6", "C": "8", "D": "9", "E": "1", "F": "3", "G": "5", "H": "6", "I": "7", "J": "9", "K": "2", "L": "3", "M": "4", "N": "6", "O": "7", "P": "8", "Q": "9", "R": "1", "S": "3", "T": "5", "U": "6", "V": "7", "W": "8", "X": "9", "Y": "2", "Z": "3"}',
                    "rgb_values" => '{"red":"214","green":"183","blue":"113"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D11',
                    "name" => 'Septenary',
                    "small_alphabet" => '{"a": "1", "b": "2", "c": "3", "d": "4", "e": "5", "f": "6", "g": "7", "h": "6", "i": "5", "j": "4", "k": "3", "l": "2", "m": "1", "n": "1", "o": "2", "p": "3", "q": "4", "r": "5", "s": "6", "t": "7", "u": "6", "v": "5", "w": "4", "x": "3", "y": "2", "z": "1"}',
                    "capital_alphabet" => '{"A": "1", "B": "2", "C": "3", "D": "4", "E": "5", "F": "6", "G": "7", "H": "6", "I": "5", "J": "4", "K": "3", "L": "2", "M": "1", "N": "1", "O": "2", "P": "3", "Q": "4", "R": "5", "S": "6", "T": "7", "U": "6", "V": "5", "W": "4", "X": "3", "Y": "2", "Z": "1"}',
                    "rgb_values" => '{"red":"224","green":"82","blue":"153"}',
                    "priority" => 0,
                ],

                [
                    "id" => 'D12',
                    "name" => 'Francis Bacon',
                    "small_alphabet" =>'{"a": "1", "b": "2", "c": "3", "d": "4", "e": "5", "f": "6", "g": "7", "h": "8", "i": "9", "j": "10", "k": "11", "l": "12", "m": "13", "n": "14", "o": "15", "p": "16", "q": "17", "r": "18", "s": "19", "t": "20", "u": "21", "v": "22", "w": "23", "x": "24", "y": "25", "z": "26","A": "27", "B": "28", "C": "29", "D": "30", "E": "31", "F": "32", "G": "33","H": "34", "I": "35", "J": "36", "K": "37", "L": "38", "M": "39", "N": "40","O": "41", "P": "42", "Q": "43", "R": "44", "S": "45", "T": "46", "U": "47", "V": "48", "W": "49", "X": "50", "Y": "51", "Z": "52"}',
                    "capital_alphabet" =>'{"a": "1", "b": "2", "c": "3", "d": "4", "e": "5", "f": "6", "g": "7", "h": "8", "i": "9", "j": "10", "k": "11", "l": "12", "m": "13", "n": "14", "o": "15", "p": "16", "q": "17", "r": "18", "s": "19", "t": "20", "u": "21", "v": "22", "w": "23", "x": "24", "y": "25", "z": "26","A": "27", "B": "28", "C": "29", "D": "30", "E": "31", "F": "32", "G": "33","H": "34", "I": "35", "J": "36", "K": "37", "L": "38", "M": "39", "N": "40","O": "41", "P": "42", "Q": "43", "R": "44", "S": "45", "T": "46", "U": "47", "V": "48", "W": "49", "X": "50", "Y": "51", "Z": "52"}',
                    "rgb_values" => '{"red":"82","green":"201","blue":"224"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D13',
                    "name" => 'Keypad',
                    "small_alphabet" =>'{"a": "2", "b": "2", "c": "2", "d": "3", "e": "3", "f": "3", "g": "4","h": "4", "i": "4", "j": "5", "k": "5", "l": "5", "m": "6","n": "6", "o": "6", "p": "7", "q": "7", "r": "7", "s": "7","t": "8", "u": "8", "v": "8", "w": "9", "x": "9", "y": "9", "z": "9"}',
                    "capital_alphabet" =>'{"A": "2", "B": "2", "C": "2", "D": "3", "E": "3", "F": "3", "G": "4","H": "4", "I": "4", "J": "5", "K": "5", "L": "5", "M": "6","N": "6", "O": "6", "P": "7", "Q": "7", "R": "7", "S": "7","T": "8", "U": "8", "V": "8", "W": "9", "X": "9", "Y": "9", "Z": "9"}',
                    "rgb_values" => '{"red":"225","green":"26","blue":"26"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D14',
                    "name" => 'Aphrodite',
                    "small_alphabet" =>'{"a": "5", "b": "10", "c": "15", "d": "20", "e": "25", "f": "30", "g": "35","h": "40", "i": "45", "j": "50", "k": "55", "l": "60", "m": "65","n": "70", "o": "75", "p": "80", "q": "85", "r": "90", "s": "95","t": "100", "u": "105", "v": "110", "w": "115", "x": "120", "y": "125", "z": "130"}',
                    "capital_alphabet" =>'{"A": "5", "B": "10", "C": "15", "D": "20", "E": "25", "F": "30", "G": "35","H": "40", "I": "45", "J": "50", "K": "55", "L": "60", "M": "65","N": "70", "O": "75", "P": "80", "Q": "85", "R": "90", "S": "95","T": "100", "U": "105", "V": "110", "W": "115", "X": "120", "Y": "125", "Z": "130"}',
                    "rgb_values" => '{"red":"225","green":"46","blue":"46"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D15',
                    "name" => 'Aphrodite Reduced',
                    "small_alphabet" =>'{"a": "5", "b": "1", "c": "6", "d": "2", "e": "7", "f": "3", "g": "8","h": "4", "i": "9", "j": "5", "k": "1", "l": "6", "m": "2","n": "7", "o": "3", "p": "8", "q": "4", "r": "9", "s": "5","t": "1", "u": "6", "v": "2", "w": "7", "x": "3", "y": "8", "z": "4"}',
                    "capital_alphabet" =>'{"A": "5", "B": "1", "C": "6", "D": "2", "E": "7", "F": "3", "G": "8","H": "4", "I": "9", "J": "5", "K": "1", "L": "6", "M": "2","N": "7", "O": "3", "P": "8", "Q": "4", "R": "9", "S": "5","T": "1", "U": "6", "V": "2", "W": "7", "X": "3", "Y": "8", "Z": "4"}',
                    "rgb_values" => '{"red":"225","green":"26","blue":"26"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D16',
                    "name" => 'English Alchemology PEN',
                    "small_alphabet" => '{"a": "2", "b": "6", "c": "10", "d": "13", "e": "16", "f": "18", "g": "21", "h": "24", "i": "28", "j": "30", "k": "34", "l": "36", "m": "39", "n": "42", "o": "46", "p": "48", "q": "52", "r": "58", "s": "58", "t": "60", "u": "66", "v": "70", "w": "74", "x": "76", "y": "80", "z": "82"}',
                    "capital_alphabet" => '{"A": "2", "B": "6", "C": "10", "D": "13", "E": "16", "F": "18", "G": "21", "H": "24", "I": "28", "J": "30", "K": "34", "L": "36", "M": "39", "N": "42", "O": "46", "P": "48", "Q": "52", "R": "58", "S": "58", "T": "60", "U": "66", "V": "70", "W": "74", "X": "76", "Y": "80", "Z": "82"}',
                    "rgb_values" => '{"red":"123","green":"193","blue":"131"}',
                    "priority" => 0,
                ],

                [
                    "id" => 'D17',
                    "name" => 'English Alchemology',
                    "small_alphabet" =>'{"a": "1", "b": "4", "c": "7", "d": "9", "e": "11", "f": "12", "g": "14","h": "16", "i": "19", "j": "20", "k": "23", "l": "24", "m": "27","n": "28", "o": "31", "p": "32", "q": "35", "r": "40", "s": "39","t": "40", "u": "45", "v": "48", "w": "51", "x": "52", "y": "55", "z": "56"}',
                    "capital_alphabet" =>'{"A": "1", "B": "4", "C": "7", "D": "9", "E": "11", "F": "12", "G": "14","H": "16", "I": "19", "J": "20", "K": "23", "L": "24", "M": "27","N": "28", "O": "31", "P": "32", "Q": "35", "R": "40", "S": "39","T": "40", "U": "45", "V": "48", "W": "51", "X": "52", "Y": "55", "Z": "56"}',
                    "rgb_values" => '{"red":"123","green":"193","blue":"131"}',
                    "prority" => 0,
                ],

                [
                    "id" => 'D18',
                    "name" => 'Chaldean Alchemology',
                    "small_alphabet" => '{"a": "1", "b": "4", "c": "7", "d": "9", "e": "11", "f": "16", "g": "7", "h": "11", "i": "1", "j": "1", "k": "4", "l": "7", "m": "9", "n": "11", "o": "14", "p": "16", "q": "1", "r": "4", "s": "7", "t": "9", "u": "12", "v": "12", "w": "12", "x": "11", "y": "1", "z": "14"}',
                    "capital_alphabet" => '{"A": "1", "B": "4", "C": "7", "D": "9", "E": "11", "F": "16", "G": "7", "H": "11", "I": "1", "J": "1", "K": "4", "L": "7", "M": "9", "N": "11", "O": "14", "P": "16", "Q": "1", "R": "4", "S": "7", "T": "9", "U": "12", "V": "12", "W": "12", "X": "11", "Y": "1", "Z": "14"}',
                    "rgb_values" => '{"red":"123","green":"193","blue":"131"}',
                    "priority" => 0,
                ],

                [
                    "id" => 'D19',
                    "name" => 'Elizabethan Extended',
                    "small_alphabet" => '{a: "1", b: "4", c: "7", d: "9", e: "11", f: "16", g: "7", h: "11", i: "1", j: "1", k: "4", l: "7", m: "9", n: "11", o: "14", p: "16", q: "1", r: "4", s: "7", t: "9", u: "12", v: "12", w: "12", x: "11", y: "1", z: "14"}',
                    "capital_alphabet" => '{A: "1", B: "4", C: "7", D: "9", E: "11", F: "16", G: "7", H: "11", I: "1", J: "1", K: "4", L: "7", M: "9", N: "11", O: "14", P: "16", Q: "1", R: "4", S: "7", T: "9", U: "12", V: "12", W: "12", X: "11", Y: "1", Z: "14"}',
                    "rgb_values" => '{"red":"219","green":"205","blue":"149"}',
                    "priority" => 0,
                ],

                [
                    "id" => 'D20',
                    "name" => 'Elizabethan R Extended',
                    "small_alphabet" => '{ "a": "500", "b": "400", "c": "300", "d": "200", "e": "100", "f": "90", "g": "80", "h": "70", "i": "70", "j": "60", "k": "50", "l": "40", "m": "30","n": "30", "o": "20", "p": "10", "q": "9", "r": "8", "s": "7", "t": "6", "u": "5", "v": "5", "w": "4", "x": "3", "y": "2", "z": "1"}',
                    "capital_alphabet" => '{ "A": "500", "B": "400", "C": "300", "D": "200", "E": "100", "F": "90", "G": "80", "H": "70", "I": "70", "J": "60", "K": "50", "L": "40", "M": "30", "N": "30", "O": "20", "P": "10", "Q": "9", "R": "8", "S": "7", "T": "6", "U": "5", "V": "5", "W": "4", "X": "3", "Y": "2", "Z": "1" }',
                    "rgb_values" => '{"red":"234","green":"210","blue":"87"}',
                    "priority" => 0,
                ],

                [
                    "id" => 'D21',
                    "name" => 'Elizabethan Simple',
                    "small_alphabet" => '{ "a": "1", "b": "2", "c": "3", "d": "4", "e": "5", "f": "6", "g": "7", "h": "8", "i": "9", "j": "9", "k": "10", "l": "11", "m": "12", "n": "13", "o": "14", "p": "15", "q": "16", "r": "17", "s": "18", "t": "19", "u": "20", "v": "20", "w": "21", "x": "22", "y": "23", "z": "24" }',
                    "capital_alphabet" => '{ "A": "1", "B": "2", "C": "3", "D": "4", "E": "5", "F": "6", "G": "7", "H": "8", "I": "9", "J": "9", "K": "10", "L": "11", "M": "12", "N": "13", "O": "14", "P": "15", "Q": "16", "R": "17", "S": "18", "T": "19", "U": "20", "V": "20", "W": "21", "X": "22", "Y": "23", "Z": "24" }',
                    "rgb_values" => '{"red":"95","green":"221","blue":"95"}',
                    "priority" => 0,
                ],
            ];

            $staticCiphers = array_merge($staticCiphers, $afterLoginArr);
        }

        $D0 = array_map('intval', json_decode($staticCiphers[0]['small_alphabet'], true));
        $D1 = array_map('intval', json_decode($staticCiphers[1]['small_alphabet'], true));
        $D2 = array_map('intval', json_decode($staticCiphers[2]['small_alphabet'], true));
        $D3 = array_map('intval', json_decode($staticCiphers[3]['small_alphabet'], true));

        // All Ciphers
        $tempArr = [];
        $tempMoreArr = [];
        $ci_settings = CipherSetting::where('user_id', $user_id)->get();

        if ($ci_settings->isEmpty()) {  // Use isEmpty() for Eloquent collections
            for ($i = 0; $i <= 3; $i++) {
                $tempArr[] = [
                    'user_id' => 'temp',
                    'cipher_id' => 'D' . $i,
                    'status' => 1,
                    'created_at' => '2024-10-02 14:00:32',
                    'updated_at' => ($i == 0) ? '2024-10-03 16:02:02' : '2024-10-02 17:19:46',
                ];
            }

            if($user_id != ""){
                for ($i = 4; $i <= 18; $i++) {
                    $tempMoreArr[] = [
                        'user_id' => 'temp',
                        'cipher_id' => 'D' . $i,
                        'status' => 1,
                        'created_at' => '2024-10-02 14:00:32',
                        'updated_at' => ($i == 0) ? '2024-10-03 16:02:02' : '2024-10-02 17:19:46',
                    ];
                }

                $tempArr = array_merge($tempArr, $tempMoreArr);
            }
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
