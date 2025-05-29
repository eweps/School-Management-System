<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use App\Enums\GenderStatus;
use App\Models\Application;
use App\Enums\MaritalStatus;
use Illuminate\Http\Request;
use App\Enums\SalutationStatus;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\MatriculeGeneratorService;

class TeacherController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.teachers.index', [
            'teachers' => Teacher::orderByDesc('id')->get()
        ]);
    }


    public function create()
    {
        return view('dashboard.admin.teachers.create', [
            'users' => User::role('teacher')->whereDoesntHave('teacher')->get()
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required|integer',
            'salutation' => ['required', Rule::in(SalutationStatus::values())],
            'idCardNumber' => 'required|string|max:50',
            'phoneNumber' => 'required|regex:/^[0-9\s\-\+\(\)]+$/|min:7',
            'address' => 'required|string|max:500',
            'preferredLanguage' => 'required|in:english,french',
            'gender' => ['required', Rule::in(GenderStatus::values())],
            'maritalStatus' => ['required', Rule::in(MaritalStatus::values())],
            'dateOfBirth' => 'required|date|before:today',
            'placeOfBirth' => 'required|string|max:255',
            'academicDiplomas' => 'nullable|string|max:500',
            'professionalDiplomas' => 'nullable|string|max:500',
            'professionalExperience' => 'nullable|string|max:1000',
            'otherRelevantInformation' => 'nullable|string|max:1000',
        ]);


       try {
         $matricule = MatriculeGeneratorService::forTeacher($validated['user']);
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }


       try {

            Teacher::create([
                'matricule' => $matricule,
                'user_id' => $validated['user'],
                'id_card_number' => $validated['idCardNumber'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'marital_status' => $validated['maritalStatus'],
                'phone_number' => $validated['phoneNumber'],
                'date_of_birth' => $validated['dateOfBirth'],
                'place_of_birth' => $validated['placeOfBirth'],
                'salutation' => $validated['salutation'],
                'preferred_language' => $validated['preferredLanguage'],
                'academic_diplomas' => $validated['academicDiplomas'],
                'professional_diplomas' => $validated['professionalDiplomas'],
                'professional_experience' => $validated['professionalExperience'],
                'other_relevant_info' => $validated['otherRelevantInformation'],
            ]);

            return redirect()->back()->with(['status' => 'teacher-created']);
        
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }
    }


    public function edit(int $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('dashboard.admin.teachers.edit', [
            "teacher" => $teacher,
            'users' => User::role('teacher')->where(function ($query) use ($teacher) {
                            $query->whereDoesntHave('teacher')
                                ->orWhere('id', $teacher->user_id);
                        })->get()
        ]);
    }


    public function update(Request $request, int $id)
    {
         $validated = $request->validate([
            'user' => 'required|integer',
            'salutation' => ['required', Rule::in(SalutationStatus::values())],
            'idCardNumber' => 'required|string|max:50',
            'phoneNumber' => 'required|regex:/^[0-9\s\-\+\(\)]+$/|min:7',
            'address' => 'required|string|max:500',
            'preferredLanguage' => 'required|in:english,french',
            'gender' => ['required', Rule::in(GenderStatus::values())],
            'maritalStatus' => ['required', Rule::in(MaritalStatus::values())],
            'dateOfBirth' => 'required|date|before:today',
            'placeOfBirth' => 'required|string|max:255',
            'academicDiplomas' => 'nullable|string|max:500',
            'professionalDiplomas' => 'nullable|string|max:500',
            'professionalExperience' => 'nullable|string|max:1000',
            'otherRelevantInformation' => 'nullable|string|max:1000',
        ]);


         try {

            Teacher::whereId($id)->update([
                'user_id' => $validated['user'],
                'id_card_number' => $validated['idCardNumber'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'marital_status' => $validated['maritalStatus'],
                'phone_number' => $validated['phoneNumber'],
                'date_of_birth' => $validated['dateOfBirth'],
                'place_of_birth' => $validated['placeOfBirth'],
                'salutation' => $validated['salutation'],
                'preferred_language' => $validated['preferredLanguage'],
                'academic_diplomas' => $validated['academicDiplomas'],
                'professional_diplomas' => $validated['professionalDiplomas'],
                'professional_experience' => $validated['professionalExperience'],
                'other_relevant_info' => $validated['otherRelevantInformation'],
            ]);

            return redirect()->back()->with(['status' => 'teacher-updated']);
        
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }

    }


     public function showCourses(int $id)
    {   
        $teacher = Teacher::findOrFail($id);
        $teacherCourseIds = [];
        $teacherCourses =$teacher->courses()->get();

        foreach($teacherCourses as $course) {
            array_push($teacherCourseIds, $course->id);
        }

        return view('dashboard.admin.teachers.show-course', [
            'teacher' => $teacher,
            'teacherCourses' => $teacher->courses()->get(),  
            'courses' => Course::whereNotIn('id', $teacherCourseIds)->get()
        ]);
    }

    public function addCourseToTeacher(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|integer',
            'teacher' => 'required|integer',
        ]);

        $teacher = Teacher::findOrFail($validated['teacher']);
        $teacher->courses()->attach($validated['course']);
        
        return back()->with(['status' => 'course-added']);
    }

    public function removeCourseFromTeacher(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|integer',
            'teacher' => 'required|integer'
        ]);

        $teacher = Teacher::findOrFail($validated['teacher']);
        $teacher->courses()->detach($validated['course']);

        return back()->with(['status' => 'course-removed']);
    }


    public function destroy(int $id)
    {
        
    }
}
