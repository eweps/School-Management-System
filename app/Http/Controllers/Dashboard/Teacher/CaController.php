<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use App\Models\CaMark;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'students' => $course->students,
            'caMarks' => CaMark::where('course_id', $id)->get()->keyBy('student_id')
        ]);
    }

    public function store(Request $request, int $courseId)
    {
        $validator = Validator::make($request->all(), [
            'marks.*.mark' => ['required', 'numeric', 'max:30']
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
                CaMark::updateOrCreate(
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
}
