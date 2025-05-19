<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.admin.index', [
            'totalTeachers' => User::role('teacher')->count(),
            'totalStudents' => User::role('student')->count(),
            'totalPendingApplications' => Application::pending()->count()
        ]);
    }
}
