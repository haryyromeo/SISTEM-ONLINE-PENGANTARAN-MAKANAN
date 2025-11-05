<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // 🔹 Tambahkan baris ini untuk mengarahkan ke tabel yang benar
    protected $table = 'customers';

    // 🔹 Jika primary key bukan 'id', tuliskan nama kolomnya
    protected $primaryKey = 'id_customer';

    // 🔹 Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'nama_customer',
        'email_customer',
        'password_customer',
        'alamat_customer',
        'telp_customer',
    ];
}
