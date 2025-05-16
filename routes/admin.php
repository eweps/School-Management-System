<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Dashboard\Admin\CourseSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\DiplomaController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;
use App\Http\Controllers\Dashboard\Admin\DepartmentController;
use App\Http\Controllers\Dashboard\Admin\LevelController;
use App\Http\Controllers\Dashboard\Admin\SemesterController;
use App\Http\Controllers\Dashboard\Admin\SystemSettingController;

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


    // Setting Routes
    Route::prefix('/settings')->as('admin.settings')->group(function() {

        Route::get('/system', [SystemSettingController::class, 'edit'])
            ->name('.system');
        Route::patch('/system/update', [SystemSettingController::class, 'update'])
            ->name('.system.update');

    });


    // Course Session Routes
    Route::prefix('/course-sessions')->as('admin.course-sessions')->group(function() {
        Route::get('', [CourseSessionController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [CourseSessionController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [CourseSessionController::class, 'update'])
            ->name('.update');

        Route::get('/create', [CourseSessionController::class, 'create'])
            ->name('.create');

        Route::post('/store', [CourseSessionController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [CourseSessionController::class , 'destroy'])
            ->name('.delete');
    });


    // Semester Routes
    Route::prefix('/semesters')->as('admin.semesters')->group(function() {
        Route::get('', [SemesterController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [SemesterController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [SemesterController::class, 'update'])
            ->name('.update');

        Route::get('/create', [SemesterController::class, 'create'])
            ->name('.create');

        Route::post('/store', [SemesterController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [SemesterController::class , 'destroy'])
            ->name('.delete');
    });


    // Level Routes
    Route::prefix('/levels')->as('admin.levels')->group(function() {
        Route::get('', [LevelController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [LevelController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [LevelController::class, 'update'])
            ->name('.update');

        Route::get('/create', [LevelController::class, 'create'])
            ->name('.create');

        Route::post('/store', [LevelController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [LevelController::class , 'destroy'])
            ->name('.delete');
    });


    

    Route::get('/departments', [DepartmentController::class, 'index'])
        ->name('admin.departments');

});

