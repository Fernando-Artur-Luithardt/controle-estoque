<?php
require __DIR__.'/auth.php';

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTrashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/dashboard')->controller(IndexController::class)->group(function(){
    Route::get('/', 'index')->name('dashboard');
});

Route::prefix('/products')->controller(ProductController::class)->group(function(){
    Route::get('/get/{product}', 'get')->name('products.get');
    Route::get('/', 'index')->name('products.index');
    Route::post('/create', 'create')->name('product.create');
    Route::get('/edit/{product?}', 'edit')->name('product.edit'); // Carrega formulário com produto
    Route::put('/update/{product?}', 'update')->name('product.update'); // Atualiza produto existente
});

Route::prefix('/product')->controller(ProductTrashController::class)->group(function(){
    Route::get('/trash', 'index')->name('product.trash.index');
    Route::post('/trash/{product}', 'update')->name('product.trash.update');
});

Route::prefix('/sales')->controller(SaleController::class)->group(function(){
    Route::get('/', 'index')->name('sale.index');
    Route::post('/create', 'create')->name('sale.create');
    // Route::get('/edit/{sale?}', 'edit')->name('sale.edit');
    // Route::put('/update/{sale?}', 'update')->name('sale.update');
});
