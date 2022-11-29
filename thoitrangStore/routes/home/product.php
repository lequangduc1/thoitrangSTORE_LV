<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/product')->name('product.')->group(function(){

    Route::get('/', [\App\Http\Controllers\HomePages\ProductController::class, 'index'])->name('list');
    Route::get('/{code}', [\App\Http\Controllers\HomePages\ProductController::class, 'detail'])->name('detail');

});
