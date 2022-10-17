<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\loginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [loginController::class, 'getLogin'])->name('login');
