<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductTypeController;

Route::prefix('/producttype')->name('producttype.')->group(function(){

    Route::get('/', [ProductTypeController::class, 'index'])->name('index');
    Route::get('/create',[ProductTypeController::class,'create'])->name('create');
    Route::post('/store',[ProductTypeController::class,'store'])->name('store');
    Route::get('/update/{id}',[ProductTypeController::class,'update'])->name('update');

});
