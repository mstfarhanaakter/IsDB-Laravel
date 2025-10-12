<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    return view('home');
})->name('home');

// Route::get('/addMoney', function(){
//     return view('pages.addMoney');
// })->name('addMoney');

// //  category
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('create', [CategoryController::class, 'create'])->name('create');
Route::post('store', [CategoryController::class, 'store'])->name('store');

Route::get('edit/{catagory_id}', [CategoryController::class, 'update'])->name('edit');

Route::post('edit-store', [CategoryController::class, 'editStore'])->name('editStore');

Route::delete('delete', [CategoryController::class, 'destroy'])->name('delete');

// Route::prefix('categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
// });
