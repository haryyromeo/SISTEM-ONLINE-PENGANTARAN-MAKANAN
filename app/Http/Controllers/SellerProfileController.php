<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerProfileController extends Controller
{
    // Tampilkan halaman profil (session-based)
    public function index()
    {
        $sellerId = session('seller_id');
        if (!$sellerId) {
            return redirect()->route('loginSeller')->with('error', 'Silakan login terlebih dahulu.');
        }

        $seller = Seller::find($sellerId);
        if (!$seller) {
            session()->forget('seller_id');
            return redirect()->route('loginSeller')->with('error', 'Akun tidak ditemukan.');
        }

        return view('profile', compact('seller'));
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $sellerId = session('seller_id');
        if (!$sellerId) {
            return redirect()->route('loginSeller')->with('error', 'Silakan login terlebih dahulu.');
        }

        $seller = Seller::find($sellerId);
        return view('edit-profile', compact('seller'));
    }

    // Proses update profil (nama, email, phone, foto)
    public function update(Request $request)
    {
        $sellerId = session('seller_id');
        if (!$sellerId) {
            return redirect()->route('loginSeller')->with('error', 'Silakan login terlebih dahulu.');
        }

        $seller = Seller::find($sellerId);

        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'email_seller' => 'required|email|max:255',
            'telp_seller' => 'nullable|string|max:20',
            'foto_seller' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto_seller')) {
            $file = $request->file('foto_seller');
            $filename = time() . '_' . $seller->id_seller . '.' . $file->getClientOriginalExtension();
            // simpan di public/uploads/sellers
            $file->move(public_path('sellers'), $filename);

            // hapus foto lama jika ada
            if ($seller->foto_seller && file_exists(public_path('sellers/'.$seller->foto_seller))) {
                @unlink(public_path('sellers/'.$seller->foto_seller));
            }

            $seller->foto_seller = $filename;
        }

        $seller->nama_seller = $request->input('nama_seller');
        $seller->email_seller = $request->input('email_seller');
        $seller->telp_seller = $request->input('telp_seller');
        $seller->save();

        return redirect()->route('seller.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
