<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Ganti User -> Customer
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        // Validasi disesuaikan dengan tabel Customer
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required|string|max:255',
            'email_customer' => 'required|string|email|unique:Customer,email_customer',
            'password_customer' => 'required|string|min:6',
            'alamat_customer' => 'required|string',
            'telp_customer' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Buat Customer baru
        $customer = Customer::create([
            'nama_customer' => $request->nama_customer,
            'email_customer' => $request->email_customer,
            'password_customer' => Hash::make($request->password_customer),
            'alamat_customer' => $request->alamat_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        auth('customer')->login($customer); // Login sebagai customer

        return redirect('/dashboard');
    }
}