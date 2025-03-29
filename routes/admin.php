<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\OverviewController;
use App\Http\Controllers\Dashboard\Admin\DepartmentController;

Route::prefix('admin')->middleware(['auth','verified', 'role:admin'])->group(function(){
    Route::get('/dashboard', OverviewController::class )
    ->name('admin.dashboard');

    //Departments
    Route::prefix('departments')->group(function(){

        Route::get('/',[DepartmentController::class, 'index'])->name('admin.departments');
        Route::get('/create',[DepartmentController::class, 'create'])->name('admin.departments.create');
    });
});
