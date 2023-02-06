<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;




// ======ADMIN +++


Route::redirect('/', 'auth/login');
// ======== LOGIN - REGISTER +++++++
Route::prefix('auth')->middleware('basicAuth')->group(function () {

    Route::get('login',[ AuthController::class,'loginPage'])->name('auth@login');
    Route::get('register',[AuthController::class,'registerPage'])->name('auth@register');
    Route::get('passChangePage', [AuthController::class,'passwordChangePage'])->name('auth@changePage');
    Route::post('changePass',[AuthController::class,'changePass'])->name('change@pass');

});


Route::middleware(['auth'])->group(function () {



// =====ADMIN=====
    Route::prefix('admin')->middleware('isAdmin')->group(function () {

        Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin@dashboard');
        Route::get('/profile',[AdminController::class,'profile'])->name('admin@profile');
        Route::get('/unlockProfile',[AdminController::class,'unlockProfile'])->name('admin@unlockProfile');

        Route::post('profileEdit/{id}',[AdminController::class,'profileEdit'])->name('admin@profileEdit');


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
            return view('all-User.userHome');
        })->name('user@home');

    });






});