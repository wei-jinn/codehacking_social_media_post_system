<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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


        if(Auth::check()){

            if(Auth::user()->isAdmin()){

                return $next($request);

            }

        }

        return redirect('/');
        //This mean if you are not an admin, you will be directed to the same page when you try to access /admin page.
    }
}
