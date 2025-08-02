<?php

namespace App\Http\Controllers\Dashboard\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OverviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.student.index', [
         'unreadNotifications' => Auth::user()->unreadNotifications()->count(),
         'totalCourses' => Auth::user()->student->availableCourses()->count(),
         'learningResources' =>  Auth::user()->student->availableCourses()->with('learningResources')->get()->flatMap->learningResources->count()
       ]);
    }
}
