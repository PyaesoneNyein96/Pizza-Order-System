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

    $this->createValidateCategory($req);
    $name = $req->categoryName;
    Category::create($this->dataCollet($req));
        return redirect()->route('admin@categoryList')
        ->with('msg','Category name ( '.$name.' )  has been added successfully.');
    }

    // ----------------
    // Delete Category
    // ----------------
    public function deleteCategory($id){
        $category = Category::where('id',$id);

        $name = Category::where('id',$id)->pluck('name');
        $name = $name[0];
        $category->delete();
        return redirect()->route('admin@categoryList')
        ->with('Delmsg', 'Category name ( '.$name.' )  has been deleted successfully.');
    }


    public function editPage($id){
        $editData = Category::where('id', $id)->first();
        // dd($editData->toArray());
        return view('admin.category.category-edit',compact('editData'));
    }


    public function updateCategory(Request $req, $id){
        $req['id'] = $id;
        // dd($req->all());
        $this->validateCategory($req);
        $data = $this->dataCollet($req);
        Category::where('id',$id)->update($data);
        return redirect()->route('admin@categoryList')->with('updateMsg', 'Category update successfully!');

    }


// &&&&&&&&&&&&&&&
            // Validation and Data Collect <><><><><><><><><>
// &&&&&&&&&&&&&&&
    private function createValidateCategory($req){
        Validator::make($req->all(),
        [ 'categoryName' => 'required|unique:categories,name'],
        ['categoryName.required' => 'Category name is required !!!'])->validate();
    }

    private function validateCategory($req){
        // dd($req->id);
      Validator::make($req->all(),
      [ 'categoryName' => 'required|unique:categories,name,'.$req->id],
      ['categoryName.required' => 'Category name is required !!!'])->validate();
    }

    private function dataCollet($req){
        return [
            'name' =>$req->categoryName,

        ];
    }
}