<?php
require __DIR__.'/auth.php';

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/', 'index')->name('products.get');
    Route::get('/create', 'create')->name('products.create');
});
