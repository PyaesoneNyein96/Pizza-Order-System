<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    // ----------------
    // Show all category
    // ----------------
    public function list(){

        $data = Category::when(request('searchValue'),function($i){
            $key = request('searchValue');
            $i->where('name','like','%'.$key.'%');
        })->orderBy('created_at','desc')->paginate(5);

        $data->appends(request()->all());
        // dd($data);
        return view('admin.category.category-list',compact('data'));
    }



    // ----------------
    // Create Page Category
    // ----------------
    public function createCategoryPage(){
        return view('admin.category.create-category');
    }

    // ----------------
    //Create Categories
    // ----------------
    public function createCategories(Request $req){

    $this->validateCategory($req);
    $name = $req->categoryName;
    Category::create($this->dataCollet($req));
        return redirect()->route('admin@categoryList')
        ->with('msg','Category name ( '.$name.' )  has been added successfully.');
    }

    // ----------------
    // Delete Category
    // ----------------
    public function deleteCategory($id){
        $category = Category::where('category_id',$id);

        $name = Category::where('category_id',$id)->pluck('name');
        $name = $name[0];
        $category->delete();
        return redirect()->route('admin@categoryList')
        ->with('Delmsg', 'Category name ( '.$name.' )  has been deleted successfully.');
    }


    public function editPage($id){
        $editData = Category::where('category_id', $id)->first();
        return view('admin.category.category-edit',compact('editData'));
    }


    public function update(Request $req, $id){
        dd($req->all(), $id);
    }



// &&&&&&&&&&&&&&&
            // Validation and Data Collect <><><><><><><><><>
// &&&&&&&&&&&&&&&


    private function validateCategory($req){
      Validator::make($req->all(),
      [ 'categoryName' => 'required|unique:categories,name'],
      ['categoryName.required' => 'Category name is required !!!'])->validate();
    }

    private function dataCollet($req){
        return [
            'name' =>$req->categoryName,
        ];
    }
}