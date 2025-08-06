<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Fee;
use App\Models\User;
use App\Models\AuthLog;
use App\Models\Department;
use App\Models\Application;
use Jenssegers\Agent\Agent;
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

        $departments = Department::all();
        $totalFees = 0;

        foreach ($departments as $department) {

            if($department->fees->count() > 0) {
                $feePerStudent = $department->fees->sum('amount');
            }else {
                $feePerStudent = 0;
            }

           
            // Count all students in all courses of this department
            $studentCount = $department->courses->sum(function ($course) {
                return $course->students->count();
            });

            $totalFees += $feePerStudent * $studentCount;
        }


        return view('dashboard.admin.index', [
            'totalTeachers' => User::role('teacher')->count(),
            'totalStudents' => User::role('student')->count(),
            'totalAdmins' => User::role('admin')->count(),
            'totalPendingApplications' => Application::pending()->count(),
            'totalApprovedApplications' => Application::approved()->count(),
            'totalRejectedApplications' => Application::rejected()->count(),
            'unreadNotifications' => Auth::user()->unreadNotifications()->count(),
            'annualFee' => $totalFees
        ]);
    }
}
