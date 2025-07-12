<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Fee;
use App\Models\Student;
use App\Models\FeeRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeRecordController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.fee-records.index', [
            'feeRecords' => FeeRecord::orderByDesc('id')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.fee-records.create', [
            'students' => Student::orderByDesc('id')->get(),
            'fees' => Fee::orderByDesc('id')->get(),
            
        ]);
    }

    public function store(Request $request)
    {
        //  $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'amount' => 'required|numeric|min:1',
        //     'department' => 'required|integer'
        // ]);
    }
}
