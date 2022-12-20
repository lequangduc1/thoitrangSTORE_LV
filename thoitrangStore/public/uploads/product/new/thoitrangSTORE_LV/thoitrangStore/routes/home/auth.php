<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->name('auth.')->group(function () {

    Route::get('/', [\App\Http\Controllers\HomePages\AuthController::class, 'login_form'])->name('login_form');
    Route::get('/register', [\App\Http\Controllers\HomePages\AuthController::class, 'register_form'])->name('register_form');
    Route::get('/logout', [\App\Http\Controllers\HomePages\AuthController::class, 'logout'])->name('logout');
    Route::post('/login', [\App\Http\Controllers\HomePages\AuthController::class, 'login'])->name('login');
    Route::post('/register', [\App\Http\Controllers\HomePages\AuthController::class, 'register'])->name('register');
    Route::get('/verify', [\App\Http\Controllers\HomePages\AuthController::class, 'verify'])->name('verify');
    Route::get('/forget', [\App\Http\Controllers\HomePages\AuthController::class, 'forgetForm'])->name('forget_form');
    Route::post('/forget', [\App\Http\Controllers\HomePages\AuthController::class, 'forget'])->name('forget');

});
