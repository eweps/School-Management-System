<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Student\CaController;
use App\Http\Controllers\Dashboard\Student\ExamController;
use App\Http\Controllers\Dashboard\Student\CourseController;
use App\Http\Controllers\Dashboard\Student\ProfileController;
use App\Http\Controllers\Dashboard\Student\OverviewController;
use App\Http\Controllers\Dashboard\Student\ResourceController;
use App\Http\Controllers\Dashboard\Student\FeeRecordController;
use App\Http\Controllers\Dashboard\Student\LiveClassController;

Route::prefix('student')->middleware(['role:student', 'auth', 'verified'])
        ->group(function () {


        Route::middleware(['ensure.student.profile'])->group(function () {

                Route::get('/dashboard', OverviewController::class)
                        ->name('student.dashboard');

                         // Fee Records Routes
                Route::prefix('/fee-records')->as('student.fee-records')->group(function () {
                        Route::get('', [FeeRecordController::class, 'index'])
                                ->name('');
                        Route::get('/download/{id}', [FeeRecordController::class, 'download'])->name('.download');
                });


                // Course routes
                Route::prefix("/courses")->as('student.courses')->group(function () {

                        Route::get('', [CourseController::class, 'index'])
                                ->name('');
                });

                Route::prefix('/resources')->as('student.resources')->group(function () {
                        Route::get('', [ResourceController::class, 'index'])
                                ->name('');
                        Route::get('/download/{id}', [ResourceController::class, 'download'])->name('.download');
                });

                Route::get('/ca-results', [CaController::class, 'index'])->name('student.ca-results');

                Route::post('/ca-results/pdf', [CaController::class, 'getPdf'])->name('student.ca-results.pdf');

                Route::get('/exam-results', [ExamController::class, 'index'])->name('student.exam-results');

                Route::post('/exam-results/pdf', [ExamController::class, 'getPdf'])->name('student.exam-results.pdf');

                Route::get('/live-classes', LiveClassController::class)->name('student.liveclasses');
        });

        
        Route::prefix('/profile')->as('student.profile')->group(function() {
            Route::get('/create', [ProfileController::class, 'create'])
                ->name('.create');
            Route::post('/store', [ProfileController::class, 'store'])
                ->name('.store');
        });



       


});
