<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function(){
    return view('admin');
});

// Route::resource('categories', CategoriesController::class);

Route::get('/categories', [CategoriesController::class, 'index']);

Route::get('create', [CategoriesController::class, 'create'])->name('create');
Route::post('store', [CategoriesController::class, 'store'])->name('store');

Route::get('edit/{catagory_id}', [CategoriesController::class, 'update'])->name('edit');

Route::post('edit-store', [CategoriesController::class, 'editStore'])->name('editStore');

Route::delete('delete', [CategoriesController::class, 'destroy'])->name('delete');


// products

// Products Routes
// Route::prefix('products')->group(function () {
//     Route::get('/', [ProductsController::class, 'index'])->name('products.index');          // List all products
//     Route::get('/create', [ProductsController::class, 'create'])->name('products.create');    // Show create form
//     Route::post('/store', [ProductsController::class, 'store'])->name('products.store');       // Store new product

//     Route::get('/edit/{product_id}', [ProductsController::class, 'update'])->name('products.edit');  // Show edit form
//     Route::post('/edit-store', [ProductsController::class, 'editStore'])->name('products.editStore'); // Handle edit form submission

//     Route::delete('/delete', [ProductsController::class, 'destroy'])->name('products.destroy'); // Delete product
// });

// new one 


Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    
    // DELETE route – note the {id} parameter
    Route::delete('/delete/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});



// Route::get('/products', [ProductsController::class, 'index']);

// Route::get('create', [ProductsController::class, 'create'])->name('create');
// Route::post('store', [ProductsController::class, 'store'])->name('store');

// Route::get('edit/{catagory_id}', [ProductsController::class, 'update'])->name('edit');

// Route::post('edit-store', [ProductsController::class, 'editStore'])->name('editStore');

// Route::delete('delete', [ProductsController::class, 'destroy'])->name('delete');