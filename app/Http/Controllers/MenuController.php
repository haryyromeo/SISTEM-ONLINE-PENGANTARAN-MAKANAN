<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{

    public function createMenu(Request $request)
    {
        // 1. Validasi data menu
        $validatedData = $request->validate([
            'id_seller' => 'required|integer|exists:seller,id_seller',
            'nama_menu' => 'required|string|max:100',
            'harga_menu' => 'required|numeric|min:0',
            'stok_menu' => 'required|integer|min:0',
        ]);

        // 2. Simpan menu ke database
        Menu::create($validatedData);

        return back()->with('success', 'Menu baru berhasil dibuat.');
    }

    public function updateMenu(Request $request, $menuId)
    {
        // 1. Temukan menu
        $menu = Menu::findOrFail($menuId);

        // Validasi
        $validatedData = $request->validate([
            'nama_menu' => 'required|string|max:100',
            'harga_menu' => 'required|numeric|min:0',
            'stok_menu' => 'required|integer|min:0',
        ]);

        // 2. Perbarui informasi menu
        // 3. Simpan perubahan
        $menu->update($validatedData);

        return back()->with('success', 'Menu berhasil diperbarui.');
    }

    public function deleteMenu($menuId)
    {
        // 1. Temukan menu
        $menu = Menu::findOrFail($menuId);
        
        // 2. Hapus dari database
        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus.');
    }

    public function listMenusBySeller($sellerId)
    {
        // 1. Ambil semua menu
        $menus = Menu::where('id_seller', $sellerId)->get();
        // 2. Kembalikan dalam bentuk list (ke view)
        return view('menu.list', ['menus' => $menus]);
    }
}