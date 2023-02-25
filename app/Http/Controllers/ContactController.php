<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function contact(){
        return view('User.contact.contact');
    }


    public function message(){
        $message = [
            'name' => request()->name,
            'email' => request()->email,
            'subject' => request()->subject,
            'message' => request()->message,
        ];
        Contact::create($message);

        return redirect()->route('user@home');

    }
}
