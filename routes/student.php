<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Student\CourseController;
use App\Http\Controllers\Dashboard\Student\OverviewController;
use App\Http\Controllers\Dashboard\Student\ResourceController;
use App\Http\Controllers\Dashboard\Student\FeeRecordController;

Route::prefix('student')->middleware(['role:student', 'auth', 'verified'])
->group(function() {

    

        Route::get('/dashboard', OverviewController::class)
                ->name('student.dashboard');
                
        // Fee Records Routes
        Route::prefix('/fee-records')->as('student.fee-records')->group(function() {
             Route::get('', [FeeRecordController::class, 'index'])
                ->name('');
             Route::get('/download/{id}', [FeeRecordController::class, 'download'])->name('.download');
        });


         // Course routes
        Route::prefix("/courses")->as('student.courses')->group(function() {

                Route::get('', [CourseController::class , 'index'])
                ->name('');
        });

        Route::prefix('/resources')->as('student.resources')->group(function() {
            Route::get('', [ResourceController::class, 'index'])
                ->name('');
            Route::get('/download/{id}', [ResourceController::class, 'download'])->name('.download');
        });
        
        // Route::middleware(['ensure.teacher.profile'])->group(function() {

        //     Route::get('/dashboard', OverviewController::class)
        //         ->name('teacher.dashboard');

        // });


        // Route::prefix('/profile')->as('teacher.profile')->group(function() {
        //     Route::get('/create', [ProfileController::class, 'create'])
        //         ->name('.create');
        //     Route::post('/store', [ProfileController::class, 'store'])
        //         ->name('.store');
        // });

      


});