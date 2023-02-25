<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function orderList(){
        $orders = Order::select('orders.*','users.name as user_name')->when(request('searchValue'), function($query){
            $key = request('searchValue');
            $query->where('orders.status','like',"%$key%")
            ->orWhere('orders.total_price','like',"%$key%")
            ->orWhere('orders.order_code','like', "%$key%")
            ->orWhere('users.name','like', "%$key%");
        })
        ->leftJoin('users','users.id','orders.user_id')
        ->orderBy('created_at','desc')->get();

        return view('admin.order.admin-order',compact('orders'));
    }



    public function switchStatus(){

        $orders = Order::select('orders.*','users.name as user_name')
        ->leftJoin('users','users.id','orders.user_id');

        if(request()->status == 'all'){
         $orders = $orders->get();
        }else{
            $orders = $orders->where('orders.status', request()->status)->get();
         }

     return view('admin.order.admin-order',compact('orders'));
     }

        // Change Each Order status
        public function statusChange(){
            logger(request()->all());
            Order::where('id', request()->id)->update([
                'status' => request()->status,
            ]);
        }






}