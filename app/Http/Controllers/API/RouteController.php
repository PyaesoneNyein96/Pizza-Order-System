<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OrderOperation;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{

public function productList(){
    $product = Product::orderBy('created_at','desc')->get();
    $categories = Category::all();

    $data = ['product'=>$product,
             'categories' => $categories];

    return response()->json($data, 200);
}

public function userList(){
    $user = User::all();
    return response()->json($user, 200);
}

// Collection
public function resources(){
    $user = User::all();
    $categories = Category::all();
    $product = Product::all();
    $cart = Cart::all();
    $order_operation = OrderOperation::all();
    $order = Order::all();
    $contact = Contact::all();

    $collection = [
      'collection'=>[
            'user' => $user,
            'categories' => $categories,
            'product' => $product,
            'cart' => $cart,
            'order_operation' => $order_operation,
            'order' => $order,
            'contact' => $contact,
      ]
    ];

    return response()->json($collection, 200);


}


}