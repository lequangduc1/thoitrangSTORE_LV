<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePages\HomeController;

Route::post('/product_detail/{id}', [HomeController::class, 'getProductById'])->name('get_product_detail');

