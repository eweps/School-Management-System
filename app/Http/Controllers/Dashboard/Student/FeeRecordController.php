<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\FeeRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FeeRecordController extends Controller
{
    public function index()
    {
        return view('dashboard.student.fee-records', [
            'feeRecords' => FeeRecord::where(['student_id' => auth()->user()->student->id])->orderByDesc('id')->get()
        ]);
    }

      public function download($recordId)
    {
        $record = FeeRecord::findOrFail($recordId);

        try {
            return Storage::disk('public')->download($record->receipt);
        }
        catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);  
        }

        return redirect()->back()->with(['error' => 'Download Failed']);  
    }
}
