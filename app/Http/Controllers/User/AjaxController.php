<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
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
        // logger($data);
        Cart::create($data);
        $res = [
            'sms' => 'add to cart Completed',
            'status' => 'success',
        ];
         return response()->json($res, 200);

    }

    // Order



    public function order(){
        // logger(request()->all());
        $total = 0;
        foreach(request()->all() as $item){
        if($item['quantity'] == 0){
                return response()->json(['status' => 'at least u have to order 1 item '], 200);
            }
        $data =  OrderOperation::create([
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
                'order_code' => $item['order_code'],
            ]);
            $total += $item['total'];
            // $total += $data->total;
        }
        Cart::where('user_id',Auth::id())->delete();
        Order::create([
            'user_id' => Auth::id(),
            'order_code' => $data->order_code,
            'total_price' => $total + 100,
        ]);

        return response()->json(
           ['sms' => 'Order Process Successfully',
            'status' => true
            ], 200);
    }

    // ==========
    // Clear Cart

    public function clearCart(){
        Cart::where('user_id', Auth::id())->delete();
    }

    // Remove Each One
    public function eachRemove(){
        Cart::where('id',request()->id)->where('user_id', Auth::id())->delete();
    }

    public function increaseViewCount(){
        $dbView =  Product::select('view_count')->where('id',request()->pizzaID)->first();
        $increaseNum = ['view_count' => $dbView->view_count + 1 ];

        Product::where('id', request()->pizzaID)->update($increaseNum);

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