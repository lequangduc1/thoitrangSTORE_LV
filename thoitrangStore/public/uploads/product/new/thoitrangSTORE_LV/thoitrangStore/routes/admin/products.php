<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('/product_master')->name('product_master.')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
