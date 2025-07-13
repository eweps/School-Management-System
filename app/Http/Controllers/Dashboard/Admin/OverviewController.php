<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Fee;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            'totalAdmins' => User::role('admin')->count(),
            'totalPendingApplications' => Application::pending()->count(),
            'totalApprovedApplications' => Application::approved()->count(),
            'totalRejectedApplications' => Application::rejected()->count(),
            'unreadNotifications' => Auth::user()->unreadNotifications()->count(),
            'annualFee' => Fee::sum('amount')
        ]);
    }
}
