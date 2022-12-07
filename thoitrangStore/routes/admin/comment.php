<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CommentController;

Route::prefix('/comment')->name('comment.')->group(function(){

    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::get('/update-status/{id}', [CommentController::class, 'updateStatus'])->name('update_status');
    Route::get('/delete/{id}', [CommentController::class, 'deleteComment'])->name('delete');


});
