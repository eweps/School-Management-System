<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\CaMark;
use App\Models\Setting;
use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CaController extends Controller
{
    public function index()
    {
        $caResults = CaMark::where(['student_id' => Auth::user()->student->id])->get();
        
        return view('dashboard.student.ca-results', [
            'caResults' => $caResults,
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

            $letterHead = Setting::where('name', 'LETTER_HEAD')->value('value');

            $pdf = Pdf::loadView('pdf.ca_results', ['user' => $user, 'courses' => $courses, "timezone" => auth()->user()->timezone, 'letterHead' => $letterHead])->setPaper('a4', 'portrait');

            $fileName = strtoupper(str_replace(' ', '_', $semester->name) . "_semester_ca_" . "_matricule_". $user->student->matricule . "_" . Str::random() . time()). ".pdf";

            return $pdf->download($fileName);

        }else{
            return back()->with('error', 'No CA Results Found For this Semester');
        }
    }
}
