<?php

use App\Http\Controllers\Dashboard\Teacher\CaController;
use App\Http\Controllers\Dashboard\Teacher\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Teacher\OverviewController;
use App\Http\Controllers\Dashboard\Teacher\ProfileController;
use App\Http\Controllers\Dashboard\Teacher\ResourceController;

Route::prefix('teacher')->middleware(['role:teacher', 'auth', 'verified'])
->group(function() {

        Route::middleware(['ensure.teacher.profile'])->group(function() {

            Route::get('/dashboard', OverviewController::class)
                ->name('teacher.dashboard');

        });


        Route::prefix('/profile')->as('teacher.profile')->group(function() {
            Route::get('/create', [ProfileController::class, 'create'])
                ->name('.create');
            Route::post('/store', [ProfileController::class, 'store'])
                ->name('.store');
        });

        Route::get('/courses', [CourseController::class, 'index'])->name('teacher.course');

        Route::prefix('/resources')->as('teacher.resources')->group(function() {
            Route::get('', [ResourceController::class, 'index'])
                ->name('');
            Route::get('/create', [ResourceController::class, 'create'])
                ->name('.create');
            Route::post('/store', [ResourceController::class, 'store'])
                ->name('.store');

            Route::delete('/delete', [ResourceController::class, 'destroy'])
                ->name('.delete');
            Route::get('/download/{id}', [ResourceController::class, 'download'])->name('.download');
        });


        Route::prefix('/ca-marks')->as('teacher.ca-marks')->group(function() {
            Route::get('', [CaController::class, 'index'])
                ->name('');
            Route::get('/create/{id}', [CaController::class, 'create'])
                ->name('.create');
            // Route::post('/store', [ResourceController::class, 'store'])
            //     ->name('.store');

            // Route::delete('/delete', [ResourceController::class, 'destroy'])
            //     ->name('.delete');
            // Route::get('/download/{id}', [ResourceController::class, 'download'])->name('.download');
        });


});