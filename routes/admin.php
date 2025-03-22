<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\OverviewController;


Route::prefix('admin')->middleware(['role:admin'])->group(function() {
 
    Route::get('/dashboard', OverviewController::class)
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard');

});

