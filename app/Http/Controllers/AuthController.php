<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek autentikasi
        if (!Auth::attempt($credentials)) {

            return back()->withErrors([
                'loginError' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

          // Regenerate session jika login berhasil
    $request->session()->regenerate();

    // Get authenticated user
    $user = Auth::user();

    // Debug and dump user data
    // dd($user);

    // Redirect berdasarkan role
    if ($user->role === 'admin') {
        return redirect('/');
    } elseif ($user->role === 'user') {
        return redirect('/');
    }

    return redirect('/');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
