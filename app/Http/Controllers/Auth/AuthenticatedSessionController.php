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

         
        $user = auth()->user();
        if ($user->hasRole('ADM')) {
            return redirect()->route('admin.users.index');
        } elseif ($user->hasRole('CIE')) {
            return redirect()->route('cie.applications.index');
        } elseif ($user->hasRole('COMM')) {
            return redirect()->route('commissioner.applications.index');
        } elseif ($user->hasRole('DED')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DFA')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DG')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DPRS')) {
            return redirect()->route('dashboard');
        }elseif ($user->hasRole('OFF')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('proprietor')) {
            return redirect()->route('registration.list');
        } elseif ($user->hasRole('PRS')) {
            return redirect()->route('dashboard');
        }elseif ($user->hasRole('PS')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('SSA')) {
            return redirect()->route('dashboard');
        } 

        return redirect()->intended(route('dashboard', absolute: false));
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
