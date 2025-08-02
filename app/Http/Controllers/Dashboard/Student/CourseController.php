<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
   
    public function index()
    {
        $levelId = Auth::user()->student->level->id;

        return view('dashboard.student.courses',[
            'courses' => Auth::user()->student->department->courses()
                                ->where('level_id', $levelId)
                                ->latest()->get()
        ]);
    }
}
