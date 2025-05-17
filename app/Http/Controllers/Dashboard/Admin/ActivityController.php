<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\AuthLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.admin.settings.activity', [
            'activities' => AuthLog::orderBy('id', 'DESC')->get()
        ]);
    }
}
