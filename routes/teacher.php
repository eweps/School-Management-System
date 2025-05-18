<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Teacher\OverviewController;


Route::prefix('teacher')->middleware(['role:teacher', 'auth', 'verified'])
->group(function() {

        Route::get('/dashboard', OverviewController::class)
        ->name('teacher.dashboard');

});