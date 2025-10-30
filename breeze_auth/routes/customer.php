<?php

use App\Http\Controllers\Vendor\VendorDeshboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->group(function () {

    Route::middleware(['auth', 'role:vendor'])->group(function () {
        Route::get('/dashboard', [VendorDeshboardController::class, 'index'])->name('vendor.dashboard');
    });
});