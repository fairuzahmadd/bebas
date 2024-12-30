<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Login berhasil
        session()->flash('success', 'Login successful! Welcome back to BeLearn.');
        return redirect()->route('home');
    } else {
        // Login gagal
        return redirect()->route('login')->withErrors(['Invalid credentials']);
    }
}

    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect()->route('login'); // Redirect ke halaman login setelah logout
    }
}