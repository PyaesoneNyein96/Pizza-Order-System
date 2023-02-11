<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!Auth::check() && url()->current() == route('auth@changePage')){
            return back();
        }

       if(Auth::check()){
            if(
                url()->current() == route('auth@login') ||
                url()->current() == route('auth@register')||
                url()->current() == route('home')

                )
                {
                    if(Auth::user()->role == 'admin' || Auth::user()->role == 'super'){
                        return redirect()->route('admin@dashboard');
                    }else{
                        return redirect()->route('user@home');
                    }
                    // return back();
            }

       }

        return $next($request);
    }
}