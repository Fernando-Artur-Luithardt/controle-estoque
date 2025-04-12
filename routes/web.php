<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(IndexController::class)->group(function(){
    Route::get('/', 'index')->name('dashboard');
});

Route::prefix('/products')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('products.get');
    Route::get('/create', 'create')->name('products.create');
});
