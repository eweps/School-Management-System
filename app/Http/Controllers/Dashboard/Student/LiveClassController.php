<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Teacher;
use App\Models\LiveClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LiveClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request)
    {
        $courseIds = [];
        $teacherIds = [];
        $teacherUserIds = [];

        // Get the students course Id's
        $studentCourses = DB::table('course_student')
                            ->select('course_id')
                            ->where(['student_id' => Auth::user()->student->id])
                            ->get()->toArray();

        foreach($studentCourses as $courseObj) {
            array_push($courseIds, $courseObj->course_id);
        }

        // Select all teachers with the selected course Ids above
        $studentTeachers = DB::table('teacher_course')
                    ->select(DB::raw("distinct teacher_id"))
                    ->whereIn('course_id', $courseIds)
                    ->get()->toArray();

        foreach($studentTeachers as $teacherObj) {
            array_push($teacherIds, $teacherObj->teacher_id);
        }

        // get teachers
        $teachers = Teacher::whereIn('id', $teacherIds)->get();

        // get teacher userIds;
        foreach($teachers as $teacher) {
            array_push($teacherUserIds, $teacher->user->id);
        }


       $liveClasses = LiveClass::whereIn('user_id', $teacherUserIds)->orderBy('id', 'DESC')->get();

        return view('dashboard.student.live-classes', [
            'liveClasses' => $liveClasses
        ]);
    }

}
