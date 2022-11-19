<?php
use Illuminate\Support\Facades\Route;

Route::middleware('home.auth')->prefix('/order')->name('order.')->group(function(){

    Route::get('', [\App\Http\Controllers\HomePages\OrderController::class,'index'])->name('index');
    Route::post('', [\App\Http\Controllers\HomePages\OrderController::class,'checkout'])->name('checkout');

});
