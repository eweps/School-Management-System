<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use App\Models\CaMark;
use App\Models\Course;
use App\Models\ExamMark;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.exam.index', [
            'courses' => Auth::user()->teacher->courses
        ]);
    }

    public function create(int $id)
    {
        $course = Course::findOrFail($id);

        return view('dashboard.teacher.exam.create', [
            'course' => $course,
            'students' => $course->students,
            'caMarks' => ExamMark::where('course_id', $id)->get()->keyBy('student_id')
        ]);
    }

    public function store(Request $request, int $courseId)
    {
        $validator = Validator::make($request->all(), [
            'marks.*.mark' => ['required', 'numeric', 'max:70']
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Please fix errors in the marks section.');
        }

        // if even 1 operation fails, let all fail
        // if all are successfull then commit
        DB::transaction(function () use ($request, $courseId) {
            foreach ($request->marks as $key => $student) {
                ExamMark::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'student_id' => $key,
                        'course_id' => $courseId,
                    ],
                    [
                        'mark' => $student['mark']
                    ]
                );
            }
        });

        return redirect()->back()->with(['status' => 'ca-saved']);
    }

    public function generatePdf(int $courseId)
    {
        $examMarks = ExamMark::with(['student.user', 'student.level', 'course'])
            ->where('course_id', $courseId)
            ->get();

        $course = $examMarks->first()->course ?? null;
        $timezone = auth()->user()->timezone ?? 'UTC';

        if (!$course) {
            return redirect()->back()->with('error', 'No exam marks found for this course.');
        }

        $pdf = Pdf::loadView('pdf.exam_marks', compact('examMarks', 'course', 'timezone'))
            ->setPaper('a4', 'portrait');

        $fileName = 'EXAM_MARKS_' . strtoupper(Str::slug($course->name)) . '_' . time() . '.pdf';

        return $pdf->download($fileName);
    }
}
