<?php

use App\Http\Controllers\login\loginController;
use Illuminate\Support\Facades\Route;



    Route::get('/admin/login', [loginController::class, 'getLogin'])->name('login');
?>
