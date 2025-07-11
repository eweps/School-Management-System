<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Student\OverviewController;

Route::prefix('student')->middleware(['role:student', 'auth', 'verified'])
->group(function() {

    

        Route::get('/dashboard', OverviewController::class)
                ->name('student.dashboard');

     
    
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