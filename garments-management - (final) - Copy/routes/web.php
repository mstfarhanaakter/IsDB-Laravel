<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionDefectController;
use App\Http\Controllers\ProductionLineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
    
});


// add custom work progress route
Route::get('/productions/work_progress', [ProductionController::class, 'workProgress'])
     ->name('productions.work_progress');

Route::get('/buyers/orders', [BuyerController::class, 'showOrders'])->name('buyers.orders');

Route::resource('buyers', BuyerController::class);
Route::resource('orders', OrderController::class);
Route::resource('productions', ProductionController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('shipments', ShipmentController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('materials', MaterialController::class);
Route::resource('purchases', PurchaseController::class);
// Route::resource('purchase-items', PurchaseItemController::class);
Route::resource('purchase-orders', PurchaseOrderController::class);
Route::resource('purchase-items', PurchaseItemController::class);

Route::get('/salaries/{id}/pdf', [SalaryController::class, 'downloadPDF'])->name('salaries.downloadPDF');


Route::resource('categories', ProductCategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('deliveries', DeliveryController::class);
Route::resource('order_items', OrderItemController::class);
Route::resource('production_defects', ProductionDefectController::class);
Route::resource('production-lines', ProductionLineController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('employee-salaries', EmployeeSalaryController::class);
route::resource('leave-requests', LeaveRequestController::class);   



















