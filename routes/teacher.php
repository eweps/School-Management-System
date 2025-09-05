<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Teacher\CaController;
use App\Http\Controllers\Dashboard\Teacher\ExamController;
use App\Http\Controllers\Dashboard\Teacher\CourseController;
use App\Http\Controllers\Dashboard\Teacher\ProfileController;
use App\Http\Controllers\Dashboard\Teacher\OverviewController;
use App\Http\Controllers\Dashboard\Teacher\ResourceController;
use App\Http\Controllers\Dashboard\Teacher\LiveClassController;

Route::prefix('teacher')->middleware(['role:teacher', 'auth'])
    ->group(function () {

        Route::middleware(['ensure.teacher.profile'])->group(function () {

            Route::get('/dashboard', OverviewController::class)
                ->name('teacher.dashboard');


            Route::get('/courses', [CourseController::class, 'index'])->name('teacher.course');

            Route::prefix('/resources')->as('teacher.resources')->group(function () {
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


            Route::prefix('/ca-marks')->as('teacher.ca-marks')->middleware('ensure.ca-marks')->group(function () {
                Route::get('', [CaController::class, 'index'])
                    ->name('');
                Route::get('/create/{id}', [CaController::class, 'create'])
                    ->name('.create');
                Route::post('/store/{id}', [CaController::class, 'store'])
                    ->name('.store');

                Route::get('/generate-pdf/{id}', [CaController::class, 'generatePdf'])
                    ->name('.pdf');
            });

            Route::prefix('/exam-marks')->as('teacher.exam-marks')->middleware('ensure.exam-marks')->group(function () {
                Route::get('', [ExamController::class, 'index'])
                    ->name('');
                Route::get('/create/{id}', [ExamController::class, 'create'])
                    ->name('.create');
                Route::post('/store/{id}', [ExamController::class, 'store'])
                    ->name('.store');
                Route::get('/generate-pdf/{id}', [ExamController::class, 'generatePdf'])
                    ->name('.pdf');
            });


            // LiveClass Routes
            Route::prefix('/liveclass')->as('teacher.liveclasses')->group(function () {
                Route::get('', [LiveClassController::class, 'index'])
                    ->name('');

                Route::get('/edit/{id}', [LiveClassController::class, 'edit'])
                    ->name('.edit');

                Route::patch('/update/{id}', [LiveClassController::class, 'update'])
                    ->name('.update');

                Route::get('/create', [LiveClassController::class, 'create'])
                    ->name('.create');

                Route::post('/store', [LiveClassController::class, 'store'])
                    ->name('.store');

                Route::delete('/delete', [LiveClassController::class, 'destroy'])
                    ->name('.delete');
            });
        });


        Route::prefix('/profile')->as('teacher.profile')->group(function () {
            Route::get('/create', [ProfileController::class, 'create'])
                ->name('.create');
            Route::post('/store', [ProfileController::class, 'store'])
                ->name('.store');
        });
    });
