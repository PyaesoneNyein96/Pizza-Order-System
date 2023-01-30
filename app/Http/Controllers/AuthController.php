<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}