<?php

use App\Http\Controllers\ArticalController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('articles', ArticalController::class);
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');