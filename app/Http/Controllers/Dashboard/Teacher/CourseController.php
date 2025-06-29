<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.course', ['courses' => Auth::user()->teacher->courses()->orderBy('id', 'DESC')->get() ]);
    }
}
