<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\CourseSession;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function apply()
    {
        $courseSessions = CourseSession::all();
        $diplomas = Diploma::all();

        return view('pages.apply', 
        [
            "courseSessions" => $courseSessions, 
            "diplomas" =>  $diplomas
        ]);
    }

    public function storeApplication(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'salutation' => 'required|in:mr,mrs,miss,ms,dr',
            'name' => 'required|string|max:255',
            'idCardNumber' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(Application::class),
            ],
            'phone' => 'required|regex:/^[0-9\s\-\+\(\)]+$/|min:7',
            'address' => 'required|string|max:500',
            'preferredLanguage' => 'required|in:english,french',
            'gender' => 'required|in:male,female',
            'maritalStatus' => 'required|in:single,married,separated,divorced',
            'dateOfBirth' => 'required|date|before:today',
            'placeOfBirth' => 'required|string|max:255',
            'academicDiplomas' => 'nullable|string|max:500',
            'professionalDiplomas' => 'nullable|string|max:500',
            'professionalExperience' => 'nullable|string|max:1000',
            'otherRelevantInformation' => 'nullable|string|max:1000',
            'preferredSession' => 'required',
            'diploma' => 'required'
        ]);

       
        try {
                Application::create( [
                'salutation' => $validated['salutation'],
                'name' => $validated['name'],
                'id_card_number' => $validated['idCardNumber'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone'],
                'address' => $validated['address'],
                'preferred_language' => $validated['preferredLanguage'],
                'gender' => $validated['gender'],
                'marital_status' => $validated['maritalStatus'],
                'date_of_birth' => $validated['dateOfBirth'],
                'place_of_birth' => $validated['placeOfBirth'],
                'academic_diplomas' => $validated['academicDiplomas'] ?? null,
                'professional_diplomas' => $validated['professionalDiplomas'] ?? null,
                'professional_experience' => $validated['professionalExperience'] ?? null,
                'other_relevant_info' => $validated['otherRelevantInformation'] ?? null,
                'course_session_id' => $validated['preferredSession'],
                'diploma_id' => $validated['diploma']
            ]);


        return redirect()->back()->with(['status' => 'application-successful']);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors([
                'exception' => 'Unexpected Error Occured'
            ]);
           
        }
    }
}
