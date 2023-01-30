<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::get('/login', function () {
//     return view('login');
// })->name('@login');

// Route::get('/register', function(){
//     return view('register');
// })->name('@register');

// Log-in , Register




// ======ADMIN +++

Route::redirect('/', 'auth/login');


Route::prefix('auth')->group(function () {

    Route::get('login',[ AuthController::class,'loginPage'])->name('auth@login');
    Route::get('register',[AuthController::class,'registerPage'])->name('auth@register');


});

//  ===== Category +++

Route::prefix('category')->group(function () {

    Route::get('list',[CategoryController::class,'list'])->name('category@list');

});