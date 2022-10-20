<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/information')->name('information.')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\InformationController::class, 'index'])->name('index');
    Route::post('/store',[\App\Http\Controllers\Admin\InformationController::class,'store'])->name('store');

});
