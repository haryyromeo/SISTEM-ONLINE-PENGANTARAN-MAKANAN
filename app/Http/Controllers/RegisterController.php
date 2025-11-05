<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

public function store(Request $request)
{
    $request->validate([
        'nama_customer' => 'required|string|max:255|unique:customers,nama_customer',
        'email_customer' => 'required|email|max:255|unique:customers,email_customer',
        'password_customer' => 'required|min:6|confirmed',
    ]);

    Customer::create([
        'nama_customer' => $request->nama_customer,
        'email_customer' => $request->email_customer,
        'password_customer' => Hash::make($request->password_customer),
        'alamat_customer' => $request->alamat_customer ?? '-', // default kosong
        'telp_customer' => $request->telp_customer ?? '-', // default kosong
    ]);

    return redirect()->route('register.form')->with('success', 'Akun berhasil dibuat! Silakan login.');
}
}
