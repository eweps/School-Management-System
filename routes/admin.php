<?php

use App\Http\Controllers\Dashboard\Admin\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\OverviewController;


Route::prefix('admin')->middleware(['role:admin', 'auth', 'verified'])->group(function() {
 
    Route::get('/dashboard', OverviewController::class)
        ->name('admin.dashboard');

    Route::get('/departments', [DepartmentController::class, 'index'])
        ->name('admin.departments');

});

