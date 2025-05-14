<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->hasRole('admin') && Auth::user()->is_active) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }
        elseif(Auth::user()->hasRole('teacher') && Auth::user()->is_active) {
           // TODO
        }
        elseif(Auth::user()->hasRole('student') && Auth::user()->is_active) {
            // TODO
        }
        else {
            $this->destroy($request);
            return redirect()->back()->with('status', 'Authentication not successful please contact the administrator');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
