<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'Seller';
    protected $primaryKey = 'id_seller';
    public $timestamps = false;

    protected $fillable = [
        'nama_seller',
        'alamat_seller',
        'telp_seller',
        'email_seller',
    ];

    // Relasi: 1 Seller punya banyak Menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_seller', 'id_seller');
    }

    // Relasi: 1 Seller punya banyak Diskon
    public function diskons()
    {
        return $this->hasMany(Diskon::class, 'id_seller', 'id_seller');
    }
}