<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        
            if(Auth::user()->LoginCheck() == $role && $role =='Admin')
            {
                return $next($request);
            }
            else if(Auth::user()->LoginCheck() == $role && $role == 'User')
            {
                return redirect('/user');
            }
            else
            {
                return back();
            }        
    }
}
