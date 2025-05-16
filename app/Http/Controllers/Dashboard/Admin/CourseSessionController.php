<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseSessionController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.course-sessions.index');
    }

    public function create()
    {
        
    }
}
