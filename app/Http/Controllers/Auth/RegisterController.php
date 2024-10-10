<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;
use Stripe\Customer;
use Stripe\Charge;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator, 'registerForm');
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        Session::flash('message', 'New Account Created Successfully');
        Session::flash('alert-class', 'alert-success');
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['plan'] != "free"){
            try {
                try {
                    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                    $customer = \Stripe\Customer::create(array(
                        'email' => $data['email'],
                        'name' => $data['name'],
                        'description' => "Client Created From Website",
                        'source'  => $data['stripeToken'],
                    ));
                } catch (Exception $e) {
                    return redirect()->back()->with('stripe_error', $e->getMessage());
                }

                try {
                    $charge = \Stripe\Charge::create(array(
                        'customer' => $customer->id,
                        'amount'   => (int)$data['price'] * 100,
                        'currency' => 'USD',
                        'description' => "Payment From Website",
                        'metadata' => array("name" => $data['name'], "email" => $data['email']),
                    ));
                } catch (Exception $e) {
                    return redirect()->back()->with('stripe_error', $e->getMessage());
                }
            } catch (Exception $e) {
                return redirect()->back()->with('stripe_error', $e->getMessage());
            }
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'plan' => $data['plan'],
        ]);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if($user->profile == null){
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->localisation = $request->localisation;
            $profile->dob = $request->dob;
            $profile->save();
        }
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
        $user->assignRole('user');

        DB::table('cipher_settings')->insert([
            [
                'user_id' => $user->id,
                'cipher_id' => 'D0',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-03 16:02:02',
            ],
            [
                'user_id' => $user->id,
                'cipher_id' => 'D1',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
            [
                'user_id' => $user->id,
                'cipher_id' => 'D2',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
            [
                'user_id' => $user->id,
                'cipher_id' => 'D3',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
        ]);
    }
}
