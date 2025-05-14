<?php

use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\DiplomaController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;
use App\Http\Controllers\Dashboard\Admin\DepartmentController;


Route::prefix('admin')->middleware(['role:admin', 'auth', 'verified'])->group(function() {
 
    Route::get('/dashboard', OverviewController::class)
        ->name('admin.dashboard');


    // Diploma routes
    Route::prefix("/diplomas")->as('admin.diplomas')->namespace()->group(function() {

        Route::get('', [DiplomaController::class , 'index'])
            ->name('');
    
        Route::get('/create', [DiplomaController::class , 'create'])
            ->name('.create');
    
        Route::post('/store', [DiplomaController::class , 'store'])
            ->name('.store');
    
        Route::get('/edit/{id}', [DiplomaController::class , 'edit'])
            ->name('.edit');
    
        Route::patch('/edit/{id}', [DiplomaController::class , 'update'])
            ->name('.update');
    
        Route::delete('/delete', [DiplomaController::class , 'destroy'])
            ->name('.delete');
    });

    // User routes
    Route::prefix('/users')->as('admin.users')->group(function() {

            Route::get('', [UserController::class, 'index'])
                ->name('');

            Route::get('/create', [UserController::class, 'create'])
                ->name('.create');

            Route::post('/store', [UserController::class, 'store'])
                ->name('.store');
        
            Route::get('/edit/{id}', [UserController::class, 'edit'])
                ->name('.edit');
            
            Route::patch('/update/{id}', 
            [UserController::class, 'update'])
                ->name('.update');

            Route::put('/update/password/{id}',
            [UserController::class, 'updatePassword'])
                ->name('.update-password');    
    });

    Route::get('/departments', [DepartmentController::class, 'index'])
        ->name('admin.departments');

});

