<?php

namespace App\Http\Controllers\Dashboard\Teacher;

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
       return view('dashboard.teacher.index', [
         'unreadNotifications' => Auth::user()->unreadNotifications()->count()
       ]);
    }
}
