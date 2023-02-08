<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.admin-dashboard');
    }

    public function profile(){
        $switch = 'false';
        return view('admin.admin-Profile',compact('switch'));
    }

    public function unlockProfile(){
        $switch ='true';
        return view('admin.admin-Profile',compact('switch'));
    }




    public function profileEdit($id){
        $this->profileUPdateValidation(request());
        $data = $this->getData(request());

        // for Image
        if(request()->hasFile('image')){
           $dbImg = Auth::user()->image;
        //    dd($dbImg);
            if($dbImg != null){
                Storage::delete('public/'.$dbImg);
            }
            $uniqueName = uniqid().'_profile_'.request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public',$uniqueName);
            $data['image'] = $uniqueName;
        }



        User::find($id)->update($data);

        return redirect()->route('admin@profile');
    }



    // ==================
    // PRIVATE FUNCTIONS
    // ==================

    // VALIDATE
    public function profileUPdateValidation($req){
        Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' =>'mimes:png,jpg,jpeg|file',
            'phone' => 'required|numeric',
        ])->validate();
    }

    // DATA COLLECT
    private function getData($req){
        return [
            'name' => $req->name,
            'email' => $req->email,
            'gender' => $req->gender,
            'address' => $req->address,
            'phone' => $req->phone,
            'updated_at' => Carbon::now(),
        ];
    }




}