<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_customer' => 'required|email',
            'password_customer' => 'required'
        ]);

        // Cari customer berdasarkan email
        $customer = Customer::where('email_customer', $request->email_customer)->first();

        // Cek apakah password cocok
        if ($customer && Hash::check($request->password_customer, $customer->password_customer)) {
            
            // Simpan data ke session
            Session::put('customer', [
                'id_customer' => $customer->id_customer,
                'nama_customer' => $customer->nama_customer,
                'email_customer' => $customer->email_customer,
            ]);

            // ✅ Redirect langsung ke dashboard
            return redirect()->route('customer.dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()->withErrors([
            'login_error' => 'Email atau password salah!',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Session::forget('customer');
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}
