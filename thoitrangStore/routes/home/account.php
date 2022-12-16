<?php
use Illuminate\Support\Facades\Route;

Route::middleware('home.auth')->prefix('/account')->name('account.')->group(function(){

    Route::get('', [\App\Http\Controllers\HomePages\AccountController::class,'index'])->name('index');
    Route::post('update', [\App\Http\Controllers\HomePages\AccountController::class,'updateAccount'])->name('update');
    Route::get('order-list',[ \App\Http\Controllers\HomePages\AccountController::class,'orderList'])->name('order-list');
    Route::get('order-detail/{id}',[\App\Http\Controllers\HomePages\AccountController::class,'orderDetail'])->name('order-detail');
    Route::get('order-destroy/{id}',[\App\Http\Controllers\HomePages\AccountController::class,'orderDestroy'])->name('order-destroy');
    Route::get('change-password', [\App\Http\Controllers\HomePages\AccountController::class, 'changePassword'])->name('change_password');
    Route::post('change-password', [\App\Http\Controllers\HomePages\AccountController::class, 'handleChangePassword'])->name('handle_change_password');

});
