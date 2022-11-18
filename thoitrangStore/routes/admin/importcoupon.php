<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImportCouponController;

Route::prefix('/importcoupon')->name('importcoupon.')->group(function(){

    Route::get('/', [ImportCouponController::class, 'index'])->name('index');
    Route::get('/detail/{id}',[ImportCouponController::class,'detail'])->name('detail');
    Route::post('/confirm',[ImportCouponController::class,'confirm'])->name('confirm');
    Route::get('/update/{id}',[ImportCouponController::class,'update'])->name('update');

});
