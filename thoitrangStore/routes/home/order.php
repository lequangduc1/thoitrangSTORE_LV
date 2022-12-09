<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['home.auth', 'home.verify_email'])->prefix('/order')->name('order.')->group(function(){

    Route::get('', [\App\Http\Controllers\HomePages\OrderController::class,'index'])->name('index');
    Route::post('', [\App\Http\Controllers\HomePages\OrderController::class,'checkout'])->name('checkout');
    Route::post('/apply-sale', [\App\Http\Controllers\HomePages\OrderController::class,'applySale'])->name('apply-sale');
    Route::get('/check-code-sale/{code}', [\App\Http\Controllers\HomePages\OrderController::class, 'checkCodeSale']);
});
