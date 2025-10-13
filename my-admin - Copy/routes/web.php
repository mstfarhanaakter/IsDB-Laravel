<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EmployeeController,
    // DepartmentController,
    // AttendanceController,
    // SalaryController,
    // LeaveRequestController
};

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    return view('home');
})->name('home');

// Route::get('/addMoney', function(){
//     return view('pages.addMoney');
// })->name('addMoney');

//  category
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('create', [CategoryController::class, 'create'])->name('create');
Route::post('store', [CategoryController::class, 'store'])->name('store');

Route::get('edit/{catagory_id}', [CategoryController::class, 'update'])->name('edit');

Route::post('edit-store', [CategoryController::class, 'editStore'])->name('editStore');

Route::delete('delete', [CategoryController::class, 'destroy'])->name('delete');



// Employee
// Route::resource('employees', EmployeeController::class);

// Departments
// Route::resource('departments', DepartmentController::class);

// Attendance
// Route::resource('attendances', AttendanceController::class);

// // Salary
// Route::resource('salaries', SalaryController::class);
// Route::get('/salaries/pay/{id}', [SalaryController::class, 'updateStatus'])->name('salaries.pay');

// Leave Requests
// Route::resource('leaves', LeaveRequestController::class);
// Route::get('/leaves/approve/{id}', [LeaveRequestController::class, 'approve'])->name('leaves.approve');
// Route::get('/leaves/reject/{id}', [LeaveRequestController::class, 'reject'])->name('leaves.reject');


// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::get('create', [EmployeeController::class, 'create'])->name('create');
// Route::post('store', [EmployeeController::class, 'store'])->name('store');

// Route::get('edit/{employee_code}', [EmployeeController::class, 'update'])->name('edit');

// Route::post('edit-store', [EmployeeController::class, 'edit'])->name('edit');

// Route::delete('delete', [EmployeeController::class, 'destroy'])->name('delete');