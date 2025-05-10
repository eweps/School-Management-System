<?php

use App\Http\Controllers\Dashboard\Admin\DepartmentController;
use App\Http\Controllers\Dashboard\Admin\DiplomaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\OverviewController;


Route::prefix('admin')->middleware(['role:admin', 'auth', 'verified'])->group(function() {
 
    Route::get('/dashboard', OverviewController::class)
        ->name('admin.dashboard');

    Route::get('/diplomas', [DiplomaController::class , 'index'])
        ->name('admin.diplomas');

    Route::get('/diplomas/create', [DiplomaController::class , 'create'])
        ->name('admin.diplomas.create');

    Route::post('/diplomas/store', [DiplomaController::class , 'store'])
        ->name('admin.diplomas.store');


    Route::get('/departments', [DepartmentController::class, 'index'])
        ->name('admin.departments');

});

