<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CaController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.ca.index', [
            'courses' => Auth::user()->teacher->courses
        ]);
    }

    public function create(int $id)
    {
        $course = Course::findOrFail($id);

        return view('dashboard.teacher.ca.create', [
            'course' => $course,
            // 'students' => $course->students
        ]);
    }
}
