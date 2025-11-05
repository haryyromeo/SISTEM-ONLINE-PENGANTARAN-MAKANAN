<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengaturHarga extends Model
{
    use HasFactory;

    // Nama tabel harus sesuai dengan migration
    protected $table = 'mengatur_hargas';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'gambar',
        'deskripsi',
    ];
}
