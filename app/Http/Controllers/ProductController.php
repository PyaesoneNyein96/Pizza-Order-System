<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{

    // MAIN SHOW
    public function list(){

        $data = Product::select('products.*', 'categories.name as category_name')->when(request('searchValue'),function($i){
            $key = request('searchValue');
            $i->where('products.name','like','%'.$key.'%')->orWhere('description','like', "%$key%"); })

            ->leftJoin('categories','products.category_id','categories.id')
            ->orderBy('products.created_at','desc')
            ->paginate(10);

        return view('admin.product.product_list',compact('data'));
    }


    // CREATE
    public function productCreatePage(){
        $categories = Category::select('id','name')->get();
        return view('admin.product.product_create', compact('categories'));
    }


    // CREATION
    public function createProduct(){
        // dd(request()->all());
       $this->ValidationCheck(request(),'create');
       $data = $this->getData(request());
       if(request()->hasFile('productImage')){
        $oriUniqueName = uniqid().'_product_'.request()->productImage->getClientOriginalName();
        request()->file('productImage')->storeAs('public/product',$oriUniqueName);
       }
       $data['image'] = $oriUniqueName;
       Product::create($data);

       return redirect()->route('admin@productList')->with('success', 'Product created successfully');
    }


    // DETAIL
    public function detail($id){
        $data = Product::select('products.*','categories.name as category_name')
        ->leftJoin('categories','products.category_id','categories.id')
        ->where('products.id', $id)->first();
        return view('admin.product.product-detail',compact('data'));
    }

    // EDIT PAGE
    public function editPage($id){
        $item = Product::find($id);
        $categories = Category::select('id','name')->get();
        return view('admin.product.product-edit',compact('item','categories'));
    }



    // UPDATE
    public function update(){
        $dbImg=request()->id;
        $dbImg = product::find($dbImg)->image;

        $this->ValidationCheck(request(),'update'); //check this out
        $item = $this->getData(request());

        if(request()->hasFile('productImage')){
            if($dbImg != null){
                Storage::delete('public/product/'.$dbImg);
            }
            $oriUniqueName = uniqid().'updateProduct'.request()->productImage->getClientOriginalName();
            request()->file('productImage')->StoreAs('public/product/',$oriUniqueName);
            $item['image'] = $oriUniqueName;
        }

        Product::where('id', request()->id)->update($item);
        return redirect()->route('admin@detailProduct',request()->id)->with('success', 'Product Updated Successfully');

    }


    // DELETE
    public function deleteProduct($id){
        $del= Product::find($id);
        $delImg = $del->image;
        Storage::delete('public/product/'.$delImg);
        $del->delete();
        return redirect()->route('admin@productList')->with('delMsg','Product Deleted successfully' );
    }




    // Validation Check

    private function ValidationCheck($req, $situation){

        $validationRules =[
            'productName' => 'required|min:2|unique:products,name,'.$req->id,
            'productDescription' => 'required|min:10',
            'productPrice' => 'required|numeric',
            'productCategory' => 'required',
            'productWaitingTime' => 'required|numeric',
            // 'productImage' => 'required|mimes:png,jpg,jpeg,webp|file',
        ];
        if($situation == 'update'){
            $validationRules['productImage'] = 'mimes:png,jpg,jpeg,webp|file';
        }else {
            $validationRules['productImage'] = 'required|mimes:png,jpg,jpeg,webp|file';
        }

        Validator::make($req->all(),$validationRules)->validate();

    }

    private function getData($req){
        return [
            'name' => $req->productName,
            'description' => $req->productDescription,
            'price' => $req->productPrice,
            'category_id' => $req->productCategory,
            'waiting_time' => $req->productWaitingTime,
        ];
    }
}