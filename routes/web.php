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

        Route::get('/category',function(){
            return view('admin.category.list');
        })->name('admin@categoryList');
});

// =====USER=====
    Route::prefix('user')->middleware('isUser')->group(function () {
        Route::get('/home', function(){
            return view('user.userHome');
        })->name('user@home');
    });




});
