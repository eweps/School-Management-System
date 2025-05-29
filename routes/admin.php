<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\LevelController;
use App\Http\Controllers\Dashboard\Admin\DiplomaController;
use App\Http\Controllers\Dashboard\Admin\ActivityController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;
use App\Http\Controllers\Dashboard\Admin\SemesterController;
use App\Http\Controllers\Dashboard\Admin\LiveClassController;
use App\Http\Controllers\Dashboard\Admin\DepartmentController;
use App\Http\Controllers\Dashboard\Admin\ApplicationController;
use App\Http\Controllers\Dashboard\Admin\CourseController;
use App\Http\Controllers\Dashboard\Admin\NotificationController;
use App\Http\Controllers\Dashboard\Admin\CourseSessionController;
use App\Http\Controllers\Dashboard\Admin\SystemSettingController;
use App\Http\Controllers\Dashboard\Admin\TeacherController;

Route::prefix('admin')->middleware(['role:admin', 'auth', 'verified'])->group(function() {
 
    Route::get('/dashboard', OverviewController::class)
        ->name('admin.dashboard');


    // Diploma routes
    Route::prefix("/diplomas")->as('admin.diplomas')->group(function() {

        Route::get('', [DiplomaController::class , 'index'])
            ->name('');
    
        Route::get('/create', [DiplomaController::class , 'create'])
            ->name('.create');
    
        Route::post('/store', [DiplomaController::class , 'store'])
            ->name('.store');
    
        Route::get('/edit/{id}', [DiplomaController::class , 'edit'])
            ->name('.edit');
    
        Route::patch('/edit/{id}', [DiplomaController::class , 'update'])
            ->name('.update');
    
        Route::delete('/delete', [DiplomaController::class , 'destroy'])
            ->name('.delete');
    });

    // Departments routes
    Route::prefix("/departments")->as('admin.departments')->group(function() {

        Route::get('', [DepartmentController::class , 'index'])
            ->name('');
    
        Route::get('/create', [DepartmentController::class , 'create'])
            ->name('.create');
    
        Route::post('/store', [DepartmentController::class , 'store'])
            ->name('.store');
    
        Route::get('/edit/{id}', [DepartmentController::class , 'edit'])
            ->name('.edit');
    
        Route::patch('/edit/{id}', [DepartmentController::class , 'update'])
            ->name('.update');
    
        Route::delete('/delete', [DepartmentController::class , 'destroy'])
            ->name('.delete');

        Route::get('/courses/{id}', [DepartmentController::class, 'showCourses'])
            ->name('.courses');

        Route::post('/courses/add/', [DepartmentController::class, 'addCourseToDepartment'])
            ->name('.courses.store');

        Route::post('/courses/remove/', [DepartmentController::class, 'removeCourseFromDepartment'])
            ->name('.courses.remove');
    });

    // Course routes
    Route::prefix("/courses")->as('admin.courses')->group(function() {

        Route::get('', [CourseController::class , 'index'])
            ->name('');
    
        Route::get('/create', [CourseController::class , 'create'])
            ->name('.create');
    
        Route::post('/store', [CourseController::class , 'store'])
            ->name('.store');
    
        Route::get('/edit/{id}', [CourseController::class , 'edit'])
            ->name('.edit');
    
        Route::patch('/edit/{id}', [CourseController::class , 'update'])
            ->name('.update');
    
        Route::delete('/delete', [CourseController::class , 'destroy'])
            ->name('.delete');
    });

    // User routes
    Route::prefix('/users')->as('admin.users')->group(function() {

            Route::get('', [UserController::class, 'index'])
                ->name('');

            Route::get('/create', [UserController::class, 'create'])
                ->name('.create');

            Route::post('/store', [UserController::class, 'store'])
                ->name('.store');
        
            Route::get('/edit/{id}', [UserController::class, 'edit'])
                ->name('.edit');
            
            Route::patch('/update/{id}', 
            [UserController::class, 'update'])
                ->name('.update');

            Route::put('/update/password/{id}',
            [UserController::class, 'updatePassword'])
                ->name('.update-password');    
    });


    // Setting Routes
    Route::prefix('/settings')->as('admin.settings')->group(function() {

        Route::get('/system', [SystemSettingController::class, 'edit'])
            ->name('.system');
        Route::patch('/system/update', [SystemSettingController::class, 'update'])
            ->name('.system.update');
    });

    
    // Auth Activity Log
    Route::get('/activities', ActivityController::class)
            ->name('admin.activities');



    // Course Session Routes
    Route::prefix('/course-sessions')->as('admin.course-sessions')->group(function() {
        Route::get('', [CourseSessionController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [CourseSessionController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [CourseSessionController::class, 'update'])
            ->name('.update');

        Route::get('/create', [CourseSessionController::class, 'create'])
            ->name('.create');

        Route::post('/store', [CourseSessionController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [CourseSessionController::class , 'destroy'])
            ->name('.delete');
    });


    // Semester Routes
    Route::prefix('/semesters')->as('admin.semesters')->group(function() {
        Route::get('', [SemesterController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [SemesterController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [SemesterController::class, 'update'])
            ->name('.update');

        Route::get('/create', [SemesterController::class, 'create'])
            ->name('.create');

        Route::post('/store', [SemesterController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [SemesterController::class , 'destroy'])
            ->name('.delete');
    });


     // LiveClass Routes
    Route::prefix('/liveclass')->as('admin.liveclasses')->group(function() {
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

         Route::delete('/delete', [LiveClassController::class , 'destroy'])
            ->name('.delete');
    });



    // Level Routes
    Route::prefix('/levels')->as('admin.levels')->group(function() {
        Route::get('', [LevelController::class, 'index'])
            ->name('');

        Route::get('/edit/{id}', [LevelController::class, 'edit'])
            ->name('.edit');

        Route::patch('/update/{id}', [LevelController::class, 'update'])
            ->name('.update');

        Route::get('/create', [LevelController::class, 'create'])
            ->name('.create');

        Route::post('/store', [LevelController::class, 'store'])
            ->name('.store');

         Route::delete('/delete', [LevelController::class , 'destroy'])
            ->name('.delete');
    });
    
    // Application routes
    Route::prefix('/applications')->as('admin.applications')->group(function() {

        Route::get('', [ApplicationController::class, 'index'])
        ->name('');

        Route::get('/{id}', [ApplicationController::class, 'show'])
        ->name('.show');

        Route::get('/generate-pdf/{id}', [ApplicationController::class, 'generatePdf'])
        ->name('.pdf');

        Route::get('/empty/generate/', [ApplicationController::class, 'generateEmptyPdf'])
        ->name('.empty.pdf');

        Route::patch('/approve', [ApplicationController::class, 'approve'])
        ->name('.approve');

        Route::patch('/reject', [ApplicationController::class, 'reject'])
        ->name('.reject');

    });


    // Teacher Routes

    Route::prefix('/teachers')->as('admin.teachers')->group(function() {

            Route::get('', [TeacherController::class, 'index'])
                ->name('');

            Route::get('/create', [TeacherController::class, 'create'])
                ->name('.create');

            Route::post('/store', [TeacherController::class, 'store'])
                ->name('.store');
        
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])
                ->name('.edit');
            
            Route::patch('/update/{id}', 
            [TeacherController::class, 'update'])
                ->name('.update');

            Route::get('/courses/{id}', [TeacherController::class, 'showCourses'])
            ->name('.courses');

            Route::post('/courses/add/', [TeacherController::class, 'addCourseToTeacher'])
            ->name('.courses.store');

            Route::post('/courses/remove/', [TeacherController::class, 'removeCourseFromTeacher'])
            ->name('.courses.remove');
    });

});

