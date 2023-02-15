<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
        public function list(){

            $carts = Cart::select('carts.*','products.name as productName','products.price as productPrice','products.image as img')
            ->leftJoin('products','products.id','carts.product_id')
            ->where('carts.user_id',Auth::id())->get();

            $total = 0;
            foreach ($carts as $cart) {
                // dd($cart->productPrice);
                $total += $cart->productPrice*$cart->quantity;
            }
                // dd($total);

            return view('User.cart.user-card',compact('carts','total'));
        }


}