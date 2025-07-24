<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
   
    public function index()
    {
        return view('dashboard.student.courses',[
            'courses' => auth()->user()->student->department->courses()->latest()->get()
        ]);
    }
}
