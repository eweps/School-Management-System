<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {

        if($request->user()->hasVerifiedEmail()) {

            if ($request->user()->hasRole('admin') && Auth::user()->is_active) {
    
                return redirect()->intended(route('admin.dashboard', absolute: false));
                
            } elseif ($request->user()->hasRole('teacher') && Auth::user()->is_active) {
    
                return redirect()->intended(route('teacher.dashboard', absolute: false));

            } elseif ($request->user()->hasRole('student') && Auth::user()->is_active) {
                  return redirect()->intended(route('student.dashboard', absolute: false));
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->back()->with('status', 'Authentication not successful please contact the administrator');
            }

        }else {
            return view('auth.verify-email');
        }
        
    }
}
