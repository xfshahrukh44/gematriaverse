<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use App\Product;
use App\Banner;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;

use App\orders;
use App\orders_products;
use Illuminate\Support\Facades\File;

class GuestController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // use Helper;

    public function __construct()
    {
        $this->middleware('guest');
        $logo = imagetable::
            select('img_path')
            ->where('table_name', '=', 'logo')
            ->first();

        $favicon = imagetable::
            select('img_path')
            ->where('table_name', '=', 'favicon')
            ->first();

        View()->share('logo', $logo);
        View()->share('favicon', $favicon);
    }

    public function signin(Request $request)
    {
        $path = public_path('subscriptions.json');

        if (File::exists($path)) {
            $json = File::get($path);
            $subscriptions = json_decode($json, true);
            $plan = $request->query('plan');
            $price = $subscriptions['subscriptions'][$plan]['price'] ?? 0;
            return view('account.signin', compact('price', 'plan'));
        } else {
            return view('account.signin');
        }
    }

    public function signup()
    {
        return view('account.signup');
    }


}
