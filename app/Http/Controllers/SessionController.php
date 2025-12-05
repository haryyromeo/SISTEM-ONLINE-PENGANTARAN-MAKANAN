<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Models\Seller;

class SessionController extends Controller
{
    // Seller Login
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login'); // pastikan file resources/views/auth/login.blade.php ada
    }
    // Proses login
    public function login(Request $request)
{
    $request->validate([
        'email_customer' => 'required|email',
        'password_customer' => 'required',
    ]);

    $customer = Customer::where('email_customer', $request->email_customer)->first();

    if ($customer && Hash::check($request->password_customer, $customer->password_customer)) {
        // Simpan session manual
        $request->session()->put('id_customer', $customer->id_customer);

       return redirect()->route('customer.DashboardCustomer')->with('success', 'Selamat datang kembali!');
    }

    return back()->withErrors(['email_customer' => 'Email atau password salah'])->withInput();
}

    // Logout
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function showLoginSeller() {
        if (session('seller_id')) return redirect()->route('DashboardSeller');
        return view('seller/loginSeller');
    }

    public function loginSeller(Request $request) {
        $request->validate([
            'email_seller' => 'required|email',
            'password' => 'required',
        ]);

        $seller = Seller::where('email_seller', $request->email_seller)->first();

        if ($seller && Hash::check($request->password, $seller->password_seller)) {
            $request->session()->put('seller_id', $seller->id_seller);
            return redirect()->route('DashboardSeller')->with('success', 'Selamat datang kembali!');
        }

        return back()->with('error', 'Email atau password salah!')->withInput();
    }

    public function logoutSeller(Request $request) {
        $request->session()->forget('seller_id');
        return redirect()->route('loginSeller')->with('success', 'Anda telah logout.');
    }
}
