<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->name('auth.')->group(function(){

    Route::get('/', [\App\Http\Controllers\HomePages\AuthController::class, 'login_form'])->name('login_form');
    Route::get('/register',[\App\Http\Controllers\HomePages\AuthController::class,'register_form'])->name('register_form');
    Route::post('/login', [\App\Http\Controllers\HomePages\AuthController::class,'login'])->name('login');
    Route::post('/register',[\App\Http\Controllers\HomePages\AuthController::class,'register'])->name('register');

});
