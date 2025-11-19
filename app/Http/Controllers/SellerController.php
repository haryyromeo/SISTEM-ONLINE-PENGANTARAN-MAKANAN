<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Menu;

class SellerController extends Controller
{

    public function getSellerProfile($sellerId)
    {
        // 1. Ambil data penjual
        $seller = Seller::findOrFail($sellerId);
        // 2. Kembalikan data profil
        return view('seller.profile', ['seller' => $seller]);
    }

    public function updateSellerProfile(Request $request, $sellerId)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'nama_seller' => 'required|string|max:25',
            'alamat_seller' => 'required|string',
            'telp_seller' => 'required|string|max:12',
            'email_seller' => 'required|email|max:20',
        ]);
        
        // 2. Perbarui informasi penjual
        $seller = Seller::findOrFail($sellerId);
        $seller->update($validatedData);

        return back()->with('success', 'Profil seller diperbarui.');
    }

    public function manageSellerMenu($sellerId)
    {
        // 1. Ambil seluruh menu milik penjual
        $menus = Menu::where('id_seller', $sellerId)->get();
        
        // 2. Kembalikan daftar menu
        return view('seller.manage_menu', ['menus' => $menus]);
    }

    public function showRegisterSeller()
    {
        return view('registerSeller');
    }

    public function registerSeller(Request $request)
    {
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'alamat_seller' => 'required|string',
            'telp_seller' => 'required|string|max:15',
            'email_seller' => 'required|email|unique:seller,email_seller',
            'password' => 'required|min:6',
        ]);

        Seller::create([
            'nama_seller' => $request->nama_seller,
            'alamat_seller' => $request->alamat_seller,
            'telp_seller' => $request->telp_seller,
            'email_seller' => $request->email_seller,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('loginSeller')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}