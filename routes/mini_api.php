<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
// API routes

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('api/student/fees/{id}', [StudentController::class, 'getFee']);
});