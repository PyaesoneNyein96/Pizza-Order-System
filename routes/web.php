<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;




// ======ADMIN +++

Route::redirect('/', 'auth/login');

// ======== LOGIN - REGISTER +++++++

Route::prefix('auth')->group(function () {
    Route::get('login',[ AuthController::class,'loginPage'])->name('auth@login');
    Route::get('register',[AuthController::class,'registerPage'])->name('auth@register');

});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {

    Route::get('dashboard',[AuthController::class,'authDashboard']);


// =====ADMIN=====
    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::get('/dashboard', function(){
            return view('admin.admin-dashboard');
        })->name('admin@dashboard');


        Route::prefix('category')->group(function () {

            Route::get('list', [CategoryController::class,'list'])->name('admin@categoryList');
            Route::get('createPage',[CategoryController::class,'createCategoryPage'])->name('admin@CreateCategoryPage');
            Route::post('create',[CategoryController::class,'createCategories'])->name('admin@CreateCategory');
            Route::get('delete/{id}',[ CategoryController::class,'deleteCategory'])->name('admin@DeleteCategory');
            Route::get('editPage/{id}',[CategoryController::class,'editPage'])->name('admin@EditCategory');
            Route::post('update/{id}',[CategoryController::class,'updateCategory'])->name('admin@UpdateCategory');

        });


});

// =====USER=====
    Route::prefix('user')->middleware('isUser')->group(function () {
        Route::get('/home', function(){
            return view('user.userHome');
        })->name('user@home');
    });




});
