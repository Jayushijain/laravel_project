<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginCheck
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
        if(Auth::check())
        {
            if(Auth::user()->LoginCheck())
            {
                // return redirect('/admin');
            }
            else
            {
                return redirect('/pricings');
            }
        }
        else
        {
            return redirect('/login');
        }
        return $next($request);
    }

}
