<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductColorController;

Route::prefix('/productcolor')->name('productcolor.')->group(function(){

    Route::get('/', [ProductColorController::class, 'index'])->name('index');
    Route::get('/create',[ProductColorController::class,'create'])->name('create');
    Route::post('/store',[ProductColorController::class,'store'])->name('store');
    Route::get('/update/{id}',[ProductColorController::class,'update'])->name('update');

});
