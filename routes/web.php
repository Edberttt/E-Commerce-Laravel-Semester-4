<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistAddController;
use App\Http\Controllers\CartAddController;
use App\Http\Controllers\CheckoutController;


use App\Http\Controllers\OrderController;

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

Route::get('/', [authcontroller::class, 'home']);

Route::middleware('authsession')->group(function(){
    //WishlistController
    // Route::post('/addToWishlist', [WishlistAddController::class, 'addToWishlist']);

    Route::post('/addToWishlist', [WishlistAddController::class, 'addToWishlist'])->name('addToWishlist');
    Route::get('/wishlistPage', [WishlistController::class, 'wishlistPage'])->name('wishlist');
    Route::post('/addToCart', [WishlistController::class, 'addToCart'])->name('addToCart');
    Route::post('/deleteWishlist', [WishlistController::class, 'deleteWishlist'])->name('deleteWishlist');
    Route::post('/addToCartfromWishlist', [WishlistController::class, 'addToCart'])->name('addToCartfromWishlist');
    Route::get('/wishlistSlider', [WishlistController::class, 'wishlistSlider'])->name('wishlistSlider');
    Route::post('/clearWishlist', [WishlistController::class, 'clearWishlist'])->name('clearWishlist');
    
    //CartController
    // Route::get('/cartPage', [CartController::class, 'cartPage'])->name('cart');
    Route::post('/addToCart', [CartAddController::class, 'addToCart'])->name('addToCart');
    Route::get('/cartPage', [CartController::class, 'cartPage'])->name('cart');
    // Route::delete('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
    // Route::match(['DELETE', 'POST'], '/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('clearCart');
    // Route::get('/cartPageDelete',[CartController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/cartPageDelete/{id}',[CartController::class, 'deleteCart'])->name('deleteCart');


    //CheckoutController
    // Route::get('/checkoutAll', [CheckoutController::class, 'checkoutAll'])->name('checkout');
    Route::post('/checkoutPage', [CheckoutController::class, 'checkoutAll'])->name('checkout');
    Route::get('/sliderCart', [CartController::class, 'sliderCart'])->name('sliderCart');
    Route::get('/index', [CartController::class, 'sliderCart'])->name('sliderCart');

    // Route::delete('/cart/delete/{cartId}', [CartController::class, 'delete'])->name('deleteCart');
    Route::post('/cart/update', [CartController::class, 'update'])->name('updateCart');


    //CheckoutController
    Route::get('/checkoutPage', [CheckoutController::class, 'checkoutPage'])->name('checkout');
    Route::post('/dataCheckout', [CheckoutController::class, 'dataCheckout'])->name('dataCheckout');
    // Route::post('/checkoutPage', [CheckoutAddController::class, 'checkoutPage'])->name('checkout');    

    Route::get('/wishlist-detail', function () {
        return view('wishlist-detail');
    });
    
    Route::get('/product', function(){
        return view('product')->with('load', 8);
    });
    Route::post('/product', [PageController::class, 'product'])->name('product');
    
    Route::get('/about', function () {
        return view('about');
    });
    
    Route::get('/checkout', function () {
        return view('checkout');
    });
    
    Route::get('/product-detail/{get}', [PageController::class, 'productDetail'])->name('product-detail');
    Route::get('/product/{get}', [PageController::class, 'productCategory'])->name('product-category');
    
    Route::get('/shoping-cart', function () {
        return view('shoping-cart');
    });

    // Route::get('/cartPage', function () {
    //     return view('cartPage');
    // });
    
    Route::get('/account_detail', [AccountController::class, 'accountDetail']);
    Route::post('/account_update', [AccountController::class, 'accountUpdate']);

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

Route::get('/account', [authcontroller::class, 'account'])->name('account');

Route::post('/submit_register', [authcontroller::class, 'submitRegister']);
Route::post('/submit_login', [authcontroller::class, 'submitLogin']);
Route::get('/logout', [authcontroller::class, 'logout']);
