<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * @return \Inertia\Response
     */
    public function home()
    {
        return Inertia::render('Home');
    }

    /**
     * @return \Inertia\Response
     */
    public function settings()
    {
        return Inertia::render('Settings');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (in_array('', $credentials)) {
            return back()->withErrors([
                'data' => 'Oops! Preencha todos os campos.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('auth.login.home'));
        }

        return back()->withErrors([
            'data' => 'Oops! As credenciais informadas não conferem.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('auth.login');
    }
}
