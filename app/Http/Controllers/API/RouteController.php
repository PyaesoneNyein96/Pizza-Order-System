<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
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
    $data = ['product'=>$product,'categories' => $categories];
    return response()->json($data, 200);
}

public function userList(){
    $user = User::all();
    return response()->json($user, 200);
}

// CATEGORY

public function categoryList(){
    $categories = Category::orderBy('created_at','desc')->get();
    return response()->json($categories, 200);
}

public function createCategory(Request $req){

    $data = ['name' => $req->name,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
            ];
    $response =  Category::create($data);
    return $response;
}

public function deleteCategory(){

   $cat =  Category::where('id', request()->id)->first();
   if(isset($cat)){
    $cat->delete();
        return response()->json([true,'sms'=> 'Delete Success','delData' => $cat], 200);
    }
        return response()->json([false,'sms'=> 'The category you want to delete is not found'], 200);
}

public function detailCategory($id){

    $cat = Category::where('id', $id)->first();

    if(isset($cat)){
        return response()->json($cat, 200);
    }
    return response()->json(['sms'=> 'There is no category'], 200);

}

public function updateCategory(Request $req){
    // return $req->name;
    $cat = Category::where('id', $req->id)->first();

    if(isset($cat)){
     $data = $this->getData($req);
        Category::where('id', $req->id)->update($data);
        $newCat = Category::where('id', $req->id)->first();
        return response()->json(['sms'=>'change'.' '.$cat->name.' '.'to'.' '.$newCat->name], 200);
    }
    return response()->json('err', 404);

}






// Helper Function

private function getData ($req){
        return ['name' => $req->category_name,
                'updated_at' => Carbon::now()
            ];
}








// create Contact

public function createContact(){

    // return request()->all();
    $data = [
        'name' => request()->name,
        'email' => request()->email,
        'subject' => request()->subject,
        'message' => request()->message,
        'created_at' => Carbon::now(),
        'created_at' => Carbon::now(),
    ];
    $res = Contact::create($data);
    return Contact::orderBy('created_at','desc')->get();
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
