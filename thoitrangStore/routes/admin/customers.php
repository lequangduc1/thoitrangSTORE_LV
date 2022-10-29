<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomersController;

Route::prefix('/customers')->name('customers.')->group(function(){

    Route::get('/', [CustomersController::class, 'index'])->name('index');
    Route::get('/update/{id}', [CustomersController::class, 'update'])->name('update');
    Route::post('/store',[CustomersController::class,'store'])->name('store');

});
