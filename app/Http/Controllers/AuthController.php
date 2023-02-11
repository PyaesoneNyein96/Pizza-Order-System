<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //  Direct login Page
        // User Dashboard Direction


    public function loginPage(){
        return view('login');
    }

    // Direct Register Page
    public function registerPage(){
            return view('register');
    }




    // Pass Change Page
    public function passwordChangePage(){
        return view('All-User.password.passwordChange');
    }

    //PASSWORD Changing method
    public function changePass(){
        $this->passwordValidationCheck(request());
        $dbPass = Auth::user()->password;
        if(Hash::check(request()->oldPassword, $dbPass)){
            User::where('id',Auth::user()->id)->update(['password'=>Hash::make(request()->newPassword)]);

            Auth::logout();
            return redirect()->route('auth@login')->with('successMsg', 'password changed successfully, Please login again');
        }
        return back()->with('errMsg', 'Old password not match !. Try again.');

    }





    private function passwordValidationCheck($req){
        Validator::make($req->all(),
        [
            'oldPassword' =>'required',
            'newPassword' =>'required|min:6',
            'confirmPassword' =>'required|min:6|same:newPassword',
        ],
        [
            'oldPassword.required' => 'Current password is required',
            'oldPassword.oldPassword' => 'Your old password is invalid !!!',

            'newPassword.required' => 'Your new password is required',
            'newPassword.confirmPassword' => 'New password and confirm password must be same',

        ])->validate();
    }





}