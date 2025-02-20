<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::put('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
