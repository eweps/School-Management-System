<?php

use App\Http\Controllers\Dashboard\Teacher\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Teacher\OverviewController;
use App\Http\Controllers\Dashboard\Teacher\ProfileController;

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

});