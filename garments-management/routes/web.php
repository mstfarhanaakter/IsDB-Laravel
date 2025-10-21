<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentsController::class);

