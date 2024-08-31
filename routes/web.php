<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('view-product/{id}',[HomeController::class,'view_product'])->name('view-product');
Route::get('view-category/{id}',[HomeController::class,'view_category'])->name('view-category');

//                                                Start Cart Controllers
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
//                                                End Cart Controllers

Route::post('order',[HomeController::class,'order'])->name('view-order');
Route::get('checkout',[HomeController::class,'checkout'])->name('checkout');
Route::post('create-order',[HomeController::class,'create_order'])->name('create-order');
Route::post('pay',[HomeController::class,'confirm_pay'])->name('pay');
Route::get('telegram',[HomeController::class,'telegram'])->name('telegram');
Route::get('send-telegram',[HomeController::class,'send_telegram'])->name('send_telegram');
Route::get('bank-transfer',[HomeController::class,'bank_transfer'])->name('bank_transfer');

Route::get('otp',[HomeController::class,'otp'])->name('otp');
Route::post('send-otp',[HomeController::class,'send_otp'])->name('send-otp');


Route::get('installment/{id}',[HomeController::class,'installment'])->name('installment');
Route::get('invoice/{id}',[HomeController::class,'invoice'])->name('invoice');
Route::get('receipt/{id}',[HomeController::class,'receipt'])->name('receipt');

Route::get('refund-and-cancel',[HomeController::class,'refund_and_cancel'])->name('refund-and-cancel');
Route::get('work-time',[HomeController::class,'work_time'])->name('work-time');
Route::get('terms',[HomeController::class,'terms'])->name('terms');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('products',ProductsController::class);
    Route::resource('sections',SectionsController::class);
    Route::resource('settings',SettingsController::class);


    Route::get('admin',[HomeController::class,'index'])->name('admin');
    Route::resource('categories',CategoriesController::class);
    Route::get('orders',[HomeController::class,'orders'])->name('orders');
    Route::get('cards',[HomeController::class,'cards'])->name('cards');

});
