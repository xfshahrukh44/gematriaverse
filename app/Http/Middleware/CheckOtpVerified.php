<?php

namespace App\Http\Middleware;

use Closure;

class CheckOtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_verified == 1) {
            return $next($request);
        } else {
            return redirect()->route('otp.otp');
        }
    }
}
