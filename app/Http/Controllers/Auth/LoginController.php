<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\User;
use App\imagetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

    public function authenticated(Request $request, $user)
    {
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedIn');

        if (auth()->user()->isAdmin() == true) {
            return redirect()->route('admin.dashboard');
        } else {

            Session::flash('message', 'You have logged In  Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('account');
        }


    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        if (auth()->user()->id != 1) {
            $user->is_verified = 0;
            $user->save();
        }
        // activity($user->name)->performedOn($user)->causedBy($user)->log('LoggedOut');
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/login');
    }
    protected function generateOtp($length = 6)
    {
        return random_int(100000, 999999); // Generates a 6-digit OTP
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if (auth()->user()->id == 1) {
                return redirect()->route('admin.dashboard');
            }

            $user = auth()->user();
            // Generate OTP and store it in the session
            $otp = $this->generateOtp();
            // $user->is_verified = 1;
            $user->otp = $otp;
            $user->expire_otp = now()->addMinutes(5);
            $user->save();

            // Send OTP to user’s email
            $this->sendOtpToUser(auth()->user()->email, $otp);

            // Redirect user to OTP verification page
            return redirect()->route('otp.otp');
        }


        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }



    protected function sendOtpToUser($email, $otp)
    {
        Mail::raw("Your OTP is: $otp", function ($message) use ($email) {
            $message->to($email)->subject('Your OTP Code');
        });
    }
}
