<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/cart')->name('cart.')->group(function(){

    Route::get('', [\App\Http\Controllers\HomePages\CartController::class,'index'])->name('index');
    Route::get('/remove/{id}', [\App\Http\Controllers\HomePages\CartController::class, 'removeCart'])->name('remove-cart');
    Route::get('/remove-all/{id}', [\App\Http\Controllers\HomePages\CartController::class, 'removeAllCart'])->name('remove-all-cart');
    Route::post('/update-quality', [\App\Http\Controllers\HomePages\CartController::class, 'updateQuality'])->name('update-quality');
    Route::get('/{id}', [\App\Http\Controllers\HomePages\CartController::class, 'addToCart'])->name('add-to-cart');

});
