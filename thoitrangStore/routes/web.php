<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\loginController;


/**
 *  g?i t?t c? route trong thu muc home (routes/admin)
 **/
Route::name('home.')->prefix('/home')->group(function () {

    foreach (File::allFiles(__DIR__ . '\home') as $route_file) {
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
        foreach (File::allFiles(__DIR__ . '/admin') as $route_file) {
            require $route_file->getPathname();
        }
    });


});
