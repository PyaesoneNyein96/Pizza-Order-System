<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderOperation;
use App\Models\OrderOpertaion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function pizzaList(){
        // logger(request()->status);

        if(request()->status == 'asc'){
            $data = Product::orderBy('created_at', 'asc')->get();
        }else{
            $data = Product::orderBy('created_at','desc')->get();
        }

         return response()->json($data, 200);
    }

    public function addToCart(Request $request){
        $data = $this->getData(request());
        logger($data);
        Cart::create($data);
        $res = [
            'sms' => 'add to cart Completed',
            'status' => 'success',
        ];
         return response()->json($res, 200);

    }

    // Order
    public function order(){
        logger(request()->all());
        foreach(request()->all() as $item){
            OrderOperation::create([
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
                'order_code' => $item['order_code'],
            ]);
        }

        Cart::where('user_id',Auth::id())->delete();
        return response()->json(
           ['sms' => 'Order Process Successfully'], 200);
    }









    private function getData($req){

    return [
        'user_id' => $req->userID,
        'product_id' => $req->pizzaID,
        'quantity' => $req->count,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ];

    }



}