<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

// Route home di luar prefix products
Route::get('/', [HomeController::class, 'index'])->name('home');

// Group route untuk produk
Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');             // /products
    Route::get('/create', 'create')->name('products.create');      // /products/create
    Route::get('/edit/{id}', 'edit')->name('products.edit');       // /products/edit/{id}
    Route::post('/store', 'store')->name('products.store');        // /products/store
    Route::post('/update/{id}', 'update')->name('products.update'); // /products/update/{id}
    Route::get('/show/{id}', 'show')->name('products.show');       // /products/show/{id}
});
