<?php

use App\Http\Controllers\Admin\AdminDeshboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminDeshboardController::class, 'index'])->name('admin.dashboard');
    });
});