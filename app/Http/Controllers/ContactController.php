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

    public function messageList(){

        $message = Contact::select('contacts.*', 'users.image as user_image', 'users.phone as user_phone', 'users.gender as user_gender')
        ->leftJoin('users', 'contacts.name', 'users.name')
        ->orderBy('created_at','desc')->paginate(20);

        return view('admin.contact.contact-list',compact('message'));

    }
}