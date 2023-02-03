<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //  Direct login Page
    public function loginPage(){
        return view('login');
    }

    // Direct Register Page
    public function registerPage(){
        return view('register');
    }

    // Pass Change Page
    public function passwordChangePage(){
        return view('user.password.passwordChange');
    }

    public function changePass(){
        dd('xxx');
    }









    // User Dashboard Direction

    public function authDashboard(){
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'super'){
            return redirect()->route('admin@dashboard');
        }else{
            return redirect()->route('user@home');
        }

    }

}