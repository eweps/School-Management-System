<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use App\Models\Teacher;
use App\Enums\GenderStatus;
use App\Enums\MaritalStatus;
use Illuminate\Http\Request;
use App\Enums\SalutationStatus;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\MatriculeGeneratorService;

class ProfileController extends Controller
{
    public function create()
    {
        return view('dashboard.teacher.profile.create');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
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
         $matricule = MatriculeGeneratorService::forTeacher(auth()->user()->id);
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }


       try {

            Teacher::create([
                'matricule' => $matricule,
                'user_id' => auth()->user()->id,
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

            return redirect()->route('teacher.dashboard')->with(['status' => 'profile-created']);
        
       } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
       }
    }
}
