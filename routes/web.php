<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware('authsession')->group(function(){
    Route::get('/wishlist-detail', function () {
        return view('wishlist-detail');
    });
    
    Route::get('/product', function () {
        return view('product');
    });
    
    Route::get('/about', function () {
        return view('about');
    });
    
    Route::get('/checkout', function () {
        return view('checkout');
    });
    
    Route::get('/product-detail', function () {
        return view('product-detail');
    });
    
    Route::get('/shoping-cart', function () {
        return view('shoping-cart');
    });
    
    Route::get('/account_detail', [AccountController::class, 'accountDetail']);

    
    Route::get('/blog-detail', function () {
        return view('blog-detail');
    });
    
    Route::get('/blog', function () {
        return view('blog');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });
    
    Route::get('/features_filter', function () {
        return view('features_filter');
    });
});

Route::get('/account', function () {
    return view('account');
})->name('account');
Route::post('/submit_register', [authcontroller::class, 'submitRegister']);
Route::post('/submit_login', [authcontroller::class, 'submitLogin']);
Route::get('/logout', [authcontroller::class, 'logout']);