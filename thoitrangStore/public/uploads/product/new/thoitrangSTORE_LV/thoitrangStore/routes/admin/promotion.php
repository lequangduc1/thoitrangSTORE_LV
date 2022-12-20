<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/promotion')->name('promotion.')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\PromotionController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\PromotionController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Admin\PromotionController::class, 'store'])->name('store');
    Route::get('/update/{id}', [\App\Http\Controllers\Admin\PromotionController::class, 'update'])->name('update');

});
