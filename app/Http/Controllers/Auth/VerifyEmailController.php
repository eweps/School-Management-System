<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {

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
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }


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
    }
}
