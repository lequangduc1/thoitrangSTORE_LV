<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductSizeController;

Route::prefix('/productsize')->name('productsize.')->group(function () {

    Route::get('/', [ProductSizeController::class, 'index'])->name('index');
    Route::get('/create', [ProductSizeController::class, 'create'])->name('create');
    Route::post('/store', [ProductSizeController::class, 'store'])->name('store');
    Route::get('/update/{id}', [ProductSizeController::class, 'update'])->name('update');

});
