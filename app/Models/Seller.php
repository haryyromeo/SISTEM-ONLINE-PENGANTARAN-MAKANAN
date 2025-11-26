<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Import yang diperlukan untuk otentikasi
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Seller extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'sellers';        // tabel sesuai migration
    protected $primaryKey = 'id_seller';
    public $timestamps = false;

    // Default penjaga (guard) untuk model ini
    protected $guard = 'seller';

    protected $fillable = [
        'nama_seller',
        'alamat_seller',
        'telp_seller',
        'email_seller',
        'password_seller',
    ];

    // Relasi ke menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_seller');
    }

    // Relasi ke diskon
    public function diskons()
    {
        return $this->hasMany(Diskon::class, 'id_seller');
    }
}   