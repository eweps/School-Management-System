<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
});

Route::middleware('guest')->group(function() {
    Route::get('/apply', [PageController::class, 'apply'])->name('apply');
    Route::post('/apply/store', [PageController::class, 'storeApplication'])->name('apply.store');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
