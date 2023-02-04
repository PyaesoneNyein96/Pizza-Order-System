<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {


            // if($request->expectsJson() && Auth::user()->role == 'admin'){
            //     return route('admin@dashboard');
            // }else if($request->expectsJson() && Auth::user()->role == 'user'){
            //     return route('user@home');
            // }

            // return redirect('auth/login');
            return route('auth@login');
        }
    }
}