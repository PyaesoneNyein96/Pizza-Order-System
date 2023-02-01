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
        $data = Category::orderBy('category_id','desc')->paginate(5);
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