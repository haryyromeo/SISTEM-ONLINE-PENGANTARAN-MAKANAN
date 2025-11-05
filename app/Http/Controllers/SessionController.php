<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Sesuaikan nama field
        $credentials = $request->validate([
            'email_customer' => 'required|email',
            'password_customer' => 'required',
        ]);

        // Coba login menggunakan guard 'customer'
        if (Auth::guard('customer')->attempt([
            'email_customer' => $credentials['email_customer'],
            'password' => $credentials['password_customer'] // Laravel otomatis cek hash
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email_customer' => 'Email atau Password tidak sesuai.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}