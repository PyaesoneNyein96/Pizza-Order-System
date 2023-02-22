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

    // PROFILE EDIT
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

        return redirect()->route('admin@profile');
    }


    // xxxxxxxxxxxxxxxx
    // AMIN MANAGEMENT
    // xxxxxxxxxxxxxxxx


    public function list(){
        $users = User::when(request('searchValue'), function ($query){
            $key = request('searchValue');
            $query->orWhere('name','like',"%$key%")
            ->orWhere('email','like',"%$key%")
            ->orWhere('phone','like', "%$key%")
            ->orWhere('gender','like', "%$key%")
            ->orWhere('address','like', "%$key%")
            ->orWhere('role','like', "%$key%");
        })->where('role','admin')
        // ->orWhere('role','super')
        ->orderBy('created_at', 'desc')->paginate(10);

       $users->appends(request()->all());
        return view('admin.manageAdmin.admin_list',compact('users'));
    }


    // DEMOTE (-)
    public function demote($id){
        $user = User::find($id);

        $toUser = ['role' => 'user'];
        $toAdmin = ['role' => 'admin'];

        if($user->role == 'admin'){
            $user->update($toUser);
        }else if($user->role == 'super'){
            $user->update($toAdmin);
        }

        return back()->with('updateMsg', 'Demote process successfully');
    }

    // PROMOTE (+)
    public function promote($id){
        $user = User::find($id);
        // dd($user->toArray());

        $toSuper = ['role' => 'super'];
        $toAdmin = ['role' => 'admin'];

        if($user->role == 'admin'){
            $user->update($toSuper);
        }else if($user->role == 'admin'){
            $user->update($toAdmin);
        }else if($user->role == 'user'){
            $user->update($toAdmin);
        }

        return back()->with('updateMsg', 'Promote process successfully');

    }

    //SUSPEND (။)
    public function suspend($id){
        $user = User::find($id);
        if($user->status == 'allows'){
            $user->update(['status'=> 'suspend']);
        }
        return back()->with('delMsg', 'This user has been Suspend');
    }
    //Allows (>)
    public function allows($id){
        $user = User::find($id);
        if($user->status == 'suspend'){
            $user->update(['status'=> 'allows']);
        }
        return back()->with('updateMsg', 'This user has been unsuspend');
    }

    // DELETE ADMIN
    public function delete($id){
        $user = User::find($id);
        User::find($id)->delete();

        return redirect()->route('admin@adminList')->with('delMsg',"$user->name - has been successfully deleted");

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