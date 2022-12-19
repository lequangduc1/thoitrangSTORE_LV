<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/product')->name('product.')->group(function(){

    Route::get('/', [\App\Http\Controllers\HomePages\ProductController::class, 'index'])->name('list');
    Route::get('/filter', [\App\Http\Controllers\HomePages\ProductController::class, 'filter'])->name('filter');
    Route::get('/{code}', [\App\Http\Controllers\HomePages\ProductController::class, 'detail'])->name('detail');
    Route::post('/add-comment', [\App\Http\Controllers\HomePages\ProductController::class, 'addComment'])->name('add_comment');
    Route::post('/filter-option',[\App\Http\Controllers\HomePages\ProductController::class,'filterOption'])->name('filter');

});
