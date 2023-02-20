<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;




// ======ADMIN +++


Route::redirect('/', 'auth/home');



// ======== LOGIN - REGISTER +++++++
Route::prefix('auth')->middleware('basicAuth')->group(function () {
    // HOME FOR ALL USER & NON-USER
    Route::get('/home',[UserController::class,'home'])->name('home');

    Route::get('login',[ AuthController::class,'loginPage'])->name('auth@login');
    Route::get('register',[AuthController::class,'registerPage'])->name('auth@register');
    Route::get('passChangePage', [AuthController::class,'passwordChangePage'])->name('auth@changePage');
    Route::post('changePass',[AuthController::class,'changePass'])->name('change@pass');

});


   // Ascending & Descending
   Route::prefix('ajax')->group(function () {
        Route::get('products/list',[AjaxController::class,'pizzaList'])->name('ajax@productsList');
        Route::get('cart',[AjaxController::class,'addToCart'])->name('ajax@addToCart');

        Route::get('order',[AjaxController::class,'order'])->name('ajax@order');
        Route::get('each/remove',[AjaxController::class,'eachRemove'])->name('ajax@eachRemove');
        Route::get('clearCart', [AjaxController::class,'clearCart'])->name('ajax@clearCart');
    });

    // User Category Filter
    Route::get('filter/{id}',[UserController::class,'filter'])->name('user@filter');


Route::middleware(['auth'])->group(function () {

// ===== ADMIN =====
    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        // ADMIN DASHBOARD
        Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin@dashboard');

        // ADMIN PROFILE
        Route::get('/profile',[AdminController::class,'profile'])->name('admin@profile');
        Route::get('/unlockProfile',[AdminController::class,'unlockProfile'])->name('admin@unlockProfile');
        Route::post('profileEdit/{id}',[AdminController::class,'profileEdit'])->name('admin@profileEdit');

        // ADMIN CATEGORY
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class,'list'])->name('admin@categoryList');
            Route::get('createPage',[CategoryController::class,'createCategoryPage'])->name('admin@CreateCategoryPage');
            Route::post('create',[CategoryController::class,'createCategories'])->name('admin@CreateCategory');
            Route::get('delete/{id}',[ CategoryController::class,'deleteCategory'])->name('admin@DeleteCategory');
            Route::get('editPage/{id}',[CategoryController::class,'editPage'])->name('admin@EditCategory');
            Route::post('update/{id}',[CategoryController::class,'updateCategory'])->name('admin@UpdateCategory');
        });

        // ADMIN PRODUCT
        Route::prefix('product')->group(function () {
            Route::get('list',[ProductController::class,'list'])->name('admin@productList');
            Route::get('createPage',[ProductController::class,'productCreatePage'])->name('admin@createProductPage');
            Route::post('create',[ProductController::class,'createProduct'])->name('admin@CreateProduct');
            Route::get('detail/{id}',[ProductController::class,'detail'])->name('admin@detailProduct');
            Route::get('edit/{id}',[ProductController::class,'editPage'])->name('admin@productEdit');

            Route::post('update',[ProductController::class,'update'])->name('admin@productUpdate');
            Route::get('delete/{id}',[ProductController::class,'deleteProduct'])->name('admin@deleteProduct');
        });

        // ADMIN LIST MANAGEMENT
        Route::prefix('Manage')->group(function () {
            Route::get('list', [AdminController::class,'list'])->name('admin@adminList');
            Route::get('delete/{id}',[AdminController::class,'delete'])->name('admin@adminDelete');
            Route::get('demote/{id}', [AdminController::class,'demote'])->name('admin@demote');
            Route::get('promote/{id}', [AdminController::class,'promote'])->name('admin@promote');
            Route::get('suspend/{id}', [AdminController::class,'suspend'])->name('admin@suspend');
            Route::get('allows/{id}', [AdminController::class,'allows'])->name('admin@allows');
        });
    }); // Admin middleware End here!--


        // =====USER=====
    Route::prefix('user')->middleware('isUser')->group(function () {
        // USER HOME
        Route::get('/home',[UserController::class,'home'])->name('user@home');
        Route::get('pizza/detail/{id}',[UserController::class,'detail'])->name('user@detail');

        // USER PROFILE
        Route::get('/profile',[UserController::class,'profile'])->name('user@profile');
        Route::get('/unlockProfile',[UserController::class,'unlockProfile'])->name('user@unlockProfile');
        Route::post('profileEdit/{id}',[UserController::class,'profileEdit'])->name('user@profileEdit');



        // Cart Manage
        Route::prefix('cart')->group(function () {
            Route::get('list',[CartController::class,'list'])->name('user@cartList');
            Route::get('history', [CartController::class,'cartHistory'])->name('user@cartHistory');
        });



    });

});