<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Level;
use App\Models\Diploma;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Department;
use App\Enums\GenderStatus;
use Illuminate\Support\Str;
use App\Enums\MaritalStatus;
use Illuminate\Http\Request;
use App\Models\CourseSession;
use App\Enums\SalutationStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\MatriculeGeneratorService;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.students.index', [
            'students' => Student::orderByDesc('id')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.students.create', [
            'users' => User::role('student')->whereDoesntHave('student')->get(),
            'courseSessions' => CourseSession::all(),
            'diplomas' => Diploma::all(),
            'departments' => Department::whereHas('courses')->get(),
            'levels' => Level::all()
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
            'maritalStatus' => ['required', Rule::in(MaritalStatus::values())],
            'dateOfBirth' => 'required|date|before:today',
            'placeOfBirth' => 'required|string|max:255',
            'department' => 'required|int',
            'diploma' => 'required|int',
            'level' => 'required|int',
            'courseSession' => 'required|int',
            'academicDiplomas' => 'nullable|string|max:500',
            'professionalDiplomas' => 'nullable|string|max:500',
            'professionalExperience' => 'nullable|string|max:1000',
            'otherRelevantInformation' => 'nullable|string|max:1000',
        ]);


       try {
         $matricule = MatriculeGeneratorService::forStudent($validated['user']);
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }


       try {

           $create =  Student::create([
                'matricule' => $matricule,
                'user_id' => $validated['user'],
                'id_card_number' => $validated['idCardNumber'],
                'address' => $validated['address'],
                'marital_status' => $validated['maritalStatus'],
                'phone_number' => $validated['phoneNumber'],
                'date_of_birth' => $validated['dateOfBirth'],
                'place_of_birth' => $validated['placeOfBirth'],
                'salutation' => $validated['salutation'],
                'department_id' => $validated['department'],
                'diploma_id' => $validated['diploma'],
                'level_id' => $validated['level'],
                'course_session_id' => $validated['courseSession'],
                'preferred_language' => $validated['preferredLanguage'],
                'academic_diplomas' => $validated['academicDiplomas'],
                'professional_diplomas' => $validated['professionalDiplomas'],
                'professional_experience' => $validated['professionalExperience'],
                'other_relevant_info' => $validated['otherRelevantInformation'],
            ]);

            

            return redirect()->back()->with(['status' => 'student-created']);
        
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }
    }


    public function edit(int $id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.admin.students.edit', [
            "student" => $student,
            'courseSessions' => CourseSession::all(),
            'diplomas' => Diploma::all(),
            'departments' => Department::whereHas('courses')->get(),
            'levels' => Level::all(),
            'users' => User::role('student')->where(function ($query) use ($student) {
                            $query->whereDoesntHave('student')
                                ->orWhere('id', $student->user_id);
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
            'maritalStatus' => ['required', Rule::in(MaritalStatus::values())],
            'dateOfBirth' => 'required|date|before:today',
            'placeOfBirth' => 'required|string|max:255',
            'department' => 'required|int',
            'diploma' => 'required|int',
            'level' => 'required|int',
            'courseSession' => 'required|int',
            'academicDiplomas' => 'nullable|string|max:500',
            'professionalDiplomas' => 'nullable|string|max:500',
            'professionalExperience' => 'nullable|string|max:1000',
            'otherRelevantInformation' => 'nullable|string|max:1000',
        ]);


         try {

            $student = Student::findOrFail($id);

            $student->update([
                'user_id' => $validated['user'],
                'id_card_number' => $validated['idCardNumber'],
                'address' => $validated['address'],
                'marital_status' => $validated['maritalStatus'],
                'phone_number' => $validated['phoneNumber'],
                'date_of_birth' => $validated['dateOfBirth'],
                'place_of_birth' => $validated['placeOfBirth'],
                'salutation' => $validated['salutation'],
                'department_id' => $validated['department'],
                'diploma_id' => $validated['diploma'],
                'level_id' => $validated['level'],
                'course_session_id' => $validated['courseSession'],
                'preferred_language' => $validated['preferredLanguage'],
                'academic_diplomas' => $validated['academicDiplomas'],
                'professional_diplomas' => $validated['professionalDiplomas'],
                'professional_experience' => $validated['professionalExperience'],
                'other_relevant_info' => $validated['otherRelevantInformation'],
            ]);

            return redirect()->back()->with(['status' => 'student-updated']);
        
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }

    }


    public function transcript(int $id)
    {
        return view('dashboard.admin.students.transcript', [
            "semesters" => Semester::all(),
            "student" => Student::findOrFail($id),
        ]);
    }

     public function getPdf(Request $request, int $id) {

        $validated = $request->validate([
            'semester' => 'required'
        ]);

        $student = Student::findOrFail($id);

        // check student semester courses
        $courses = $student->courses->where("semester_id",$validated['semester']);

        // get semester
        $semester = Semester::findOrFail($validated['semester']);

        if($courses->count() > 0){

            $pdf = Pdf::loadView('pdf.exam_results', ['user' => $student->user, 'courses' => $courses, 'semester' => $semester, "timezone" => auth()->user()->timezone])->setPaper('a4', 'landscape');

            $fileName = strtoupper(str_replace(' ', '_', $semester->name) . "_semester_exam_" . "_matricule_". $student->matricule . "_" . Str::random() . time()). ".pdf";

            return $pdf->download($fileName);

        }else{
            return back()->with('error', 'No Exam Results Found For this Semester');
        }
    }

}
