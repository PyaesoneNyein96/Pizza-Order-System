<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('User.main.user-home',compact('products','categories'));

    }
}