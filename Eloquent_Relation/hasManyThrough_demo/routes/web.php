<?php

use App\Http\Controllers\ApplicationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/applications',[ApplicationsController::class, 'index']);
