<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home(){
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $status='all';
        return view('User.main.user-home',compact('products','categories','status'));

    }

    //Detail
    public function detail($id){
        $item = Product::find($id);
        $uMayLike = Product::where('category_id',$item->category_id)->get();
        // $uMayLike = Product::get();
        return view('User.main.user-detail',compact('item','uMayLike'));
    }


    // User Profile lock and unlock
    public function profile(){
        $switch = 'false';
        return view('User.main.user-profile',compact('switch'));
    }
    public function unlockProfile(){
        $switch ='true';
        return view('User.main.user-profile',compact('switch'));
    }

    // PROFILE EDIT AND UPDATE
    public function profileEdit($id){
        $this->profileUPdateValidation(request());
        $data = $this->getData(request());
        // for Image
        if(request()->hasFile('image')){
           $dbImg = Auth::user()->image;

            if($dbImg != null){
                Storage::delete('public/'.$dbImg);
            }
            $uniqueName = uniqid().'_profile_'.request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public',$uniqueName);
            $data['image'] = $uniqueName;
        }

        User::find($id)->update($data);

        return redirect()->route('user@profile');
    }

    // user Filter
    public function filter($id){
       $status = $id;
    //    dd($status);
       $products = Product::where('category_id', $id)->orderBy('created_at', 'desc')->get();
       $categories = Category::get();
       return view('User.main.user-home',compact('products','categories','status'));
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