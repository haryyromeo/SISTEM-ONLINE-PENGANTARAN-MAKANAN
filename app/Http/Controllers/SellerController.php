<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller 
{
    // Register seller
    public function showRegisterSeller() {
        return view('seller/registerSeller');
    }

    public function registerSeller(Request $request) {
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'alamat_seller' => 'required|string|max:255',
            'telp_seller' => 'required|string|max:15',
            'email_seller' => 'required|string|email|max:255|unique:sellers,email_seller',
            'password_seller' => 'required|string|min:8|confirmed',
        ]);

        Seller::create([
            'nama_seller' => $request->nama_seller,
            'alamat_seller' => $request->alamat_seller,
            'telp_seller' => $request->telp_seller,
            'email_seller' => $request->email_seller,
            'password_seller' => Hash::make($request->password_seller),
        ]);

        return redirect()->route('loginSeller')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Dashboard
    public function dashboard() {
        $seller = Seller::find(session('seller_id'));
        if (!$seller) return redirect()->route('loginSeller')->with('error', 'Silakan login.');
        return view('seller/DashboardSeller', compact('seller'));
    }

    // Lihat profil
    public function profile() {
    $sellerId = session('seller_id'); // ambil session
    if (!$sellerId) {
        return redirect('/loginSeller')->with('error', 'Silakan login dulu.');
    }

    $seller = Seller::find($sellerId);
    return view('seller/profile', compact('seller'));
}


    // Form edit profil
    public function editProfile() {
        $seller = Seller::find(session('seller_id'));
        if (!$seller) return redirect()->route('loginSeller')->with('error', 'Silakan login.');
        return view('seller/edit-profile', compact('seller'));
    }

    // Update profil
    public function updateProfile(Request $request) {
        $seller = Seller::find(session('seller_id'));
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'email_seller' => 'required|email|max:255',
            'telp_seller' => 'nullable|string|max:15',
            'alamat_seller' => 'nullable|string|max:255',
            'foto_seller' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('foto_seller')) {
            $file = $request->file('foto_seller');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('sellers'), $filename);

            if($seller->foto_seller && file_exists(public_path('sellers/'.$seller->foto_seller))) {
                unlink(public_path('sellers/'.$seller->foto_seller));
            }

            $seller->foto_seller = $filename;
        }

        $seller->nama_seller = $request->nama_seller;
        $seller->email_seller = $request->email_seller;
        $seller->telp_seller = $request->telp_seller;
        $seller->alamat_seller = $request->alamat_seller;
        $seller->save();

        return redirect()->route('seller.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Logout
    public function logout(Request $request) {
        $request->session()->forget('seller_id');
        return redirect()->route('loginSeller')->with('success', 'Berhasil logout!');
    }

    // ==========================
    // MENU CRUD
    // ==========================
    public function menuList() {
        $seller = Seller::find(session('seller_id'));
        $menus = Menu::where('id_seller', $seller->id_seller)->get();
        return view('menulist', compact('seller', 'menus'));
    }

    public function addMenu() {
        return view('seller/addmenu');
    }

    public function storeMenu(Request $request) {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar_menu' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $gambarNama = null;
        if ($request->hasFile('gambar_menu')) {
            $gambar = $request->file('gambar_menu');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/menu'), $gambarNama);
        }

        Menu::create([
            'id_seller' => session('seller_id'),
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga,
            'stok_menu' => $request->stok,
            'gambar_menu' => $gambarNama,
        ]);

        return redirect()->route('sellerMenu')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function editMenu($id) {
        $menu = Menu::findOrFail($id);
        return view('seller/editmenu', compact('menu'));
    }

    public function updateMenu(Request $request, $id) {
        $menu = Menu::findOrFail($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->harga_menu = $request->harga;
        $menu->stok_menu = $request->stok;

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/menu'), $filename);
            $menu->gambar_menu = $filename;
        }

        $menu->save();
        return redirect()->route('sellerMenu')->with('success', 'Menu berhasil diperbarui!');
    }

    public function deleteMenu($id) {
        $menu = Menu::findOrFail($id);
        if ($menu->gambar_menu && file_exists(public_path('images/menu/' . $menu->gambar_menu))) {
            unlink(public_path('images/menu/' . $menu->gambar_menu));
        }
        $menu->delete();
        return redirect()->route('sellerMenu')->with('success', 'Menu berhasil dihapus!');
    }
}
