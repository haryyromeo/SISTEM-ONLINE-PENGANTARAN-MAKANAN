<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Seller;

class SessionController extends Controller
{
    // ============================= // CUSTOMER LOGIN // =============================
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email_customer' => 'required|email',
            'password_customer' => 'required'
        ]);

        $customer = Customer::where('email_customer', $request->email_customer)->first();

        if ($customer && Hash::check($request->password_customer, $customer->password_customer)) {
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

    // ============================= // SELLER LOGIN // =============================
    public function showLoginSeller()
    {
        // Jika sudah login (ada session('seller_id')), langsung ke dashboard
        if (session('seller_id')) {
            return redirect()->route('DashboardSeller');
        }
        return view('LoginSeller'); // Mengarah ke view LoginSeller.blade.php
    }

    // Proses login seller
   public function loginSeller(Request $request)
{
    $request->validate([
        'email_seller' => 'required|email',
        'password' => 'required',
    ]);

    $seller = Seller::where('email_seller', $request->email_seller)->first();

    if ($seller && Hash::check($request->password, $seller->password_seller)) {

        $request->session()->put('seller_id', $seller->id_seller);
        return redirect()->route('DashboardSeller')->with('success', 'Selamat datang kembali!');
    } return back()->with('error', 'Email atau password salah!')->withInput(); 
}
    
    // Proses logout seller
    public function logoutSeller(Request $request)
    {
        // Hapus session 'seller_id'
        $request->session()->forget('seller_id');
        
        // Alihkan kembali ke halaman login seller
        return redirect()->route('loginSeller')->with('success', 'Anda telah logout.');
    }
}
    
           