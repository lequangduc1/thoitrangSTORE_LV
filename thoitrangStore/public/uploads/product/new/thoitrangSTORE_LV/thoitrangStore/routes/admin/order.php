<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/order')->name('order.')->group(function () {

    Route::get('', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'detail'])->name('detail');
    Route::get('/update-status/{idOrder}/{status}', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('update-status');
    Route::post('/search', [\App\Http\Controllers\Admin\OrderController::class, 'search'])->name('search');
});
