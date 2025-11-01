<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionDefectController;
use App\Http\Controllers\ProductionLineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// add custom work progress route
Route::get('/productions/work-progress', [ProductionController::class, 'workProgress'])
     ->name('productions.work-progress');

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentsController::class);
Route::resource('productions', ProductionController::class);
Route::resource('materials',MaterialController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('stocktransactions', StockReportController::class);
Route::resource('production_lines', ProductionLineController::class);
Route::resource('defects', ProductionDefectController::class);



// Route::get('/work-progress', [ProductionController::class, 'workProgress'])->name('productions.work_progress');











