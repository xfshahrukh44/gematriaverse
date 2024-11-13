<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showForgotPasswordForm (Request $request)
    {
        return view('account.forgot-password');
    }

    public function sendResetPasswordLink (Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ],[
            'email.exists' => 'No account with the email you provided exists.'
        ]);

        $user = User::where('email', $request->email)->first();
        $user->remember_token = Str::random(60);
        $user->save();

        $html = '<p>Dear '.$user->name.', click <a href="'.route('show.reset.password', $user->remember_token).'">here</a> to reset your password</p><br />';

//        Mail::send([], [], function ($message) use ($user, $html,) {
//            $message->to($user->email)
//                ->subject('Gematriaverse | Reset password')
//                ->setBody($html, 'text/html');
//        });

        \mail($user->email, 'Gematriaverse | Reset password', $html);

        return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
    }

    public function showResetPasswordForm (Request $request, $token)
    {
        if (!$user = User::where('remember_token', $token)->first()) {
            return redirect()->route('forgot.password')->with('error', 'Reset password link has expired.');
        }

        return view('account.reset-password', compact('token'));
    }

    public function resetPassword (Request $request)
    {
        $request->validate([
            'remember_token' => 'required',
            'password' => 'required'
        ]);

        if (!$user = User::where('remember_token', $request->remember_token)->first()) {
            return redirect()->route('forgot.password')->with('error', 'Reset password link has expired.');
        }

        $user->password = Hash::make($request->password);
        $user->is_verified = 1;
        $user->remember_token = null;
        $user->save();

        auth()->login($user);
        return redirect()->route('account')->with('success', 'Your password has been successfully reset!');
    }
}
