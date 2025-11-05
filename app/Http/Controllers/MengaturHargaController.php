<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MengaturHarga;

class MengaturHargaController extends Controller
{
    // Tampilkan daftar produk
    public function index()
    {
        $produk = MengaturHarga::all();
        return view('mengaturharga.index', compact('produk'));
    }

    // Form edit harga
    public function edit($id)
    {
        $produk = MengaturHarga::findOrFail($id);
        return view('mengaturharga.edit', compact('produk'));
    }

    // Proses update harga
    public function update(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required|numeric|min:0',
        ], [
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh negatif.',
        ]);

        $produk = MengaturHarga::findOrFail($id);
        $produk->update(['harga' => $request->harga]);

        return redirect()->route('mengaturharga.index')->with('success', 'Harga berhasil diperbarui!');
    }
}
