<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


/**
 *  gọi tất cả route trong thư mục admin (routes/admin)
 **/
Route::name('home.')->prefix('/')->group(function () {
    foreach (File::allFiles(__DIR__ . '/home') as $route_file) {
        require $route_file->getPathname();
    }
});
/**
 *  gọi tất cả route trong thư mục home (routes/home)
 **/
Route::name('admin.')->prefix('/')->group(function () {
    foreach (File::allFiles(__DIR__ . '/admin') as $route_file) {
        require $route_file->getPathname();
    }
});
