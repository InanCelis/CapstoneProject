<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class NumberMiddleware
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

        if(Auth::user()->number_verified == 0)
        {
            Auth::logout();
            return redirect('/login')->with('error', 'Your account is not yet verified to your number');
        }

        return $next($request);
        
    }
}
