<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\HomePages\HomeController;


/**
 *  g?i t?t c? route trong thu muc home (routes/admin)
 **/
Route::name('home.')->prefix('/')->group(function () {
    Route::get('/',[HomeController::class, 'home'])->name('home');
    foreach (File::allFiles(__DIR__ . '/home') as $route_file) {
        require $route_file->getPathname();
    }

});
/**
 *  g?i t?t c? route trong thu muc admin (routes/home)
 **/
Route::name('admin.')->prefix('/admin')->group(function () {

    Route::middleware('admin.not.auth')->group(function(){
        Route::get('/login',[LoginController::class, 'form_login'])->name('login');
        Route::post('/login',[LoginController::class, 'login'])->name('login');
    });

    Route::middleware('admin.auth')->group(function(){
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    });

    Route::middleware('admin.auth')->group(function(){
        Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
        foreach (File::allFiles(__DIR__ . '/admin') as $route_file) {
            require $route_file->getPathname();
        }
    });


});
