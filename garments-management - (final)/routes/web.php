<?php



use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
    
});

Route::get('/buyers/orders', [BuyerController::class, 'showOrders'])->name('buyers.orders');

Route::resource('buyers', BuyerController::class);
Route::resource('orders', OrderController::class);
Route::resource('productions', ProductionController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('shipments', ShipmentController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('materials', MaterialController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase-items', PurchaseItemController::class);

















