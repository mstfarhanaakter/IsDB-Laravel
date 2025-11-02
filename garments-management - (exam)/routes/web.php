<?php


use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionDefectController;
use App\Http\Controllers\ProductionLineController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


// add custom work progress route
Route::get('/productions/work-progress', [ProductionController::class, 'workProgress'])
     ->name('productions.work-progress');

Route::resource('orders', OrderController::class);
Route::resource('buyers', BuyerController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentsController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('supplies', SupplyController::class);
Route::resource('purchase_orders', PurchaseOrderController::class);
Route::resource('productions', ProductionController::class);
Route::resource('production_lines', ProductionLineController::class);
Route::resource('defects', ProductionDefectController::class);












