<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MengaturHarga;

class MengaturHargaController extends Controller
{
    public function index()
    {
        $produk = MengaturHarga::all();
        return view('mengaturharga.index', compact('produk'));
    }

    public function edit($id)
    {
        $produk = MengaturHarga::findOrFail($id);
        return view('mengaturharga.edit', compact('produk'));
    }

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
