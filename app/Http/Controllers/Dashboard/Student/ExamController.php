<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\ExamMark;
use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $examResults = ExamMark::where(['student_id' => Auth::user()->student->id])->get();
        return view('dashboard.student.exam-results', [
            'examResults' => $examResults,
            'semesters' => Semester::orderByDesc('id')->get(),
        ]);
    }

    public function getPdf(Request $request) {

        $validated = $request->validate([
            'semester' => 'required'
        ]);

        $user = Auth::user();

        // check student semester courses
        $courses = $user->student->courses->where("semester_id",$validated['semester']);

        // get semester
        $semester = Semester::findOrFail($validated['semester']);

        if($courses->count() > 0){

            $pdf = Pdf::loadView('pdf.exam_results', ['user' => $user, 'courses' => $courses, 'semester' => $semester, "timezone" => auth()->user()->timezone])->setPaper('a4', 'landscape');

            $fileName = strtoupper(str_replace(' ', '_', $semester->name) . "_semester_exam_" . "_matricule_". $user->student->matricule . "_" . Str::random() . time()). ".pdf";

            return $pdf->download($fileName);

        }else{
            return back()->with('error', 'No Exam Results Found For this Semester');
        }
    }
}
