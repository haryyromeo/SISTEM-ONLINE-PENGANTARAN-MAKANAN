<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class SessionController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function showLoginDriver()
    {
        return view('loginDriver');
    }

    public function loginDriver(Request $request)
    {
        $request->validate([
            'email_driver' => 'required|email',
            'password' => 'required'
        ]);

        $driver = \App\Models\Driver::where('email_driver', $request->email_driver)->first();

        if ($driver && Hash::check($request->password, $driver->password_driver)) {

            Session::put('driver', [
                'id_driver' => $driver->id_driver,
                'nama_driver' => $driver->nama_driver,
                'email_driver' => $driver->email_driver,
                'telp_driver' => $driver->telp_driver,
            ]);

            return redirect()->route('/DashboardDriver')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'login_error' => 'Email atau password salah!'
        ])->withInput();
    }

    public function showLoginSeller()
    {
        return view('loginSeller'); // tampilan seller (loginSeller.blade.php)
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_customer' => 'required|email',
            'password_customer' => 'required'
        ]);

        $customer = Customer::where('email_customer', $request->email_customer)->first();

        if ($customer && Hash::check($request->password_customer, $customer->password_customer)) {

            // Simpan data customer di session
            Session::put('customer', [
                'id_customer' => $customer->id_customer,
                'nama_customer' => $customer->nama_customer,
                'email_customer' => $customer->email_customer
            ]);

            // ✅ Setelah login, arahkan langsung ke DashboardCustomer
            return redirect('/DashboardCustomer')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'login_error' => 'Email atau password salah!'
        ])->withInput();
    }

    public function logout()
    {
        Session::forget('customer');
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
