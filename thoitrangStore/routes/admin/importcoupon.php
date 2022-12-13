<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImportCouponController;

Route::prefix('/importcoupon')->name('importcoupon.')->group(function(){

    Route::get('/', [ImportCouponController::class, 'index'])->name('index');
    Route::get('/detail/{id}',[ImportCouponController::class,'detail'])->name('detail');
    Route::post('/confirm',[ImportCouponController::class,'confirm'])->name('confirm');

    Route::get('/create',[ImportCouponController::class,'create'])->name('create');
    Route::post('/search',[ImportCouponController::class,'search'])->name('search');
    Route::post('/addToCart',[ImportCouponController::class,'addToCart'])->name('addToCart');

});
