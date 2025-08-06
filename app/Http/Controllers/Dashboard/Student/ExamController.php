<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\ExamMark;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $examMarks = ExamMark::where(['student_id' => Auth::user()->student->id])->get();
        
        return view('dashboard.student.exam.index', [
            'examMarks' => $examMarks
        ]);
    }
}
