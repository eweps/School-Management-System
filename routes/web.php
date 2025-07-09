<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;


  Route::get('/', [PageController::class, 'index'])->name('home');
// Route::get('/contact', [PageController::class, 'contact']);
// Route::get('/about', [PageController::class, 'aboutUs']);


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
     Route::prefix('/notifications')->as('notifications')->group(function() {

        Route::get('', [NotificationController::class, 'index'])
        ->name('');
        Route::get('/{id}', [NotificationController::class, 'show'])
        ->name('.show');

    });
});

Route::get('/apply', [PageController::class, 'apply'])->name('apply');
Route::post('/apply/store', [PageController::class, 'storeApplication'])->name('apply.store');
// Route::middleware('guest')->group(function() {
    
// });

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/teacher.php';
require __DIR__.'/student.php';
