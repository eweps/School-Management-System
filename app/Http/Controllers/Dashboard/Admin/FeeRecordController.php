<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeRecord;
use Illuminate\Http\Request;

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
        return view('dashboard.admin.fee-records.create');
    }
}
