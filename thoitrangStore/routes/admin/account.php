<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/account')->name('account.')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\AccountController::class, 'index'])->name('index');
    Route::get('/create',[\App\Http\Controllers\Admin\AccountController::class,'create'])->name('create');
    Route::post('/store',[\App\Http\Controllers\Admin\AccountController::class,'store'])->name('store');
    Route::get('/update/{id}',[\App\Http\Controllers\Admin\AccountController::class,'update'])->name('update');

});
