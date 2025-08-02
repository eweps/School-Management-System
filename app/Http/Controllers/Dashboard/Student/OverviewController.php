<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Teacher;
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

        $student = Auth::user()->student;

        $totalTeachers =  Teacher::whereHas('courses', function($query) use ($student){
            $query->whereIn('courses.id', $student->courses->pluck('id'));
        })->distinct()->count('id');


        return view('dashboard.student.index', [
         'unreadNotifications' => Auth::user()->unreadNotifications()->count(),
         'totalCourses' => Auth::user()->student->courses()->count(),
         'learningResources' =>  Auth::user()->student->courses()->with('learningResources')->get()->flatMap->learningResources->count(),
         'totalTeachers' => $totalTeachers
       ]);
    }
}
