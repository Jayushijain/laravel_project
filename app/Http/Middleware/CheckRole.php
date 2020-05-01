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
            //echo $role;
                
            if(Auth::user()->LoginCheck() == $role && $role =='Admin')
            {
                // echo $role.'1';
                // exit();
                return $next($request);
            }
            else if(Auth::user()->LoginCheck() == $role && $role == 'User')
            {
                // echo $role.'2';
                // exit();
                return $next($request);
            }
            else
            {
                // echo $role.'3';
                // exit();
                return $next($request);
            }        
    }
}
