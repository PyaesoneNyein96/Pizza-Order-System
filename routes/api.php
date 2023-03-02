<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RouteController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product/list',[RouteController::class,'productList']);
Route::get('user/list',[RouteController::class,'userList']);

Route::get('category/list',[RouteController::class,'categoryList']);
Route::post('create/category',[RouteController::class,'createCategory']);
Route::post('delete/category',[RouteController::class,'deleteCategory']);

// Route::post('detail/category', [RouteController::class,'detailCategory']);
Route::get('category/list/{id}', [RouteController::class,'detailCategory']);

Route::post('update/category',[RouteController::class,'updateCategory']);



// Route::post('create/contact',[RouteController::class,'createContact']);

Route::get('resourceApi', [RouteController::class,'resources']);