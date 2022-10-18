<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->name('dashboard.')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');

});
