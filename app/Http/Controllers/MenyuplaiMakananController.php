<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenyuplaiMakanan;

class MenyuplaiMakananController extends Controller
{
    // Tampilkan halaman form + data
    public function index()
    {
        $data = MenyuplaiMakanan::all();
        return view('MenyuplaiMakanan', compact('data'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:0',
            'gambar' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        MenyuplaiMakanan::create($request->all());

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }
}
