<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\CaMark;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CaController extends Controller
{
    public function index()
    {
        $caResults = CaMark::where(['student_id' => Auth::user()->student->id])->get();
        
        return view('dashboard.student.ca-results', [
            'caResults' => $caResults
        ]);
    }
}
