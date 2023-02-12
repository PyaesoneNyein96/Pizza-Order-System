<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function pizzaList(){
        // logger(request()->status);

        if(request()->status == 'asc'){
            $data = Product::orderBy('created_at', 'asc')->get();
        }else{
            $data = Product::orderBy('created_at','desc')->get();
        }

        return $data;
    }



}