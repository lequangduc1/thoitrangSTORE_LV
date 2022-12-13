<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductDetailController;

Route::prefix('/products')->name('products.')->group(function(){

    Route::get('/', [ProductDetailController::class, 'index'])->name('index');
    Route::get('/create',[ProductDetailController::class,'create'])->name('create');
    Route::post('/store',[ProductDetailController::class,'store'])->name('store');
    Route::get('/update/{id}',[ProductDetailController::class,'update'])->name('update');
    Route::get('/{id}',[ProductDetailController::class,'destroy'])->name('destroy');

});
