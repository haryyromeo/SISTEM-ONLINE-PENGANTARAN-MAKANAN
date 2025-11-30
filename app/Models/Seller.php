<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Seller extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'sellers';
    protected $primaryKey = 'id_seller';
    public $timestamps = false;

    protected $guard = 'seller';

    protected $fillable = [
        'nama_seller',
        'alamat_seller',
        'telp_seller',
        'email_seller',
        'password_seller',
        'foto_seller',      // ← tambahkan ini untuk foto profil
    ];

    // RELASI
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_seller');
    }

    public function diskons()
    {
        return $this->hasMany(Diskon::class, 'id_seller');
    }

    // AUTOMATIS HASH PASSWORD SETIAP DIUPDATE
    public function setPasswordSellerAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password_seller'] = Hash::make($value);
        }
    }

    // URL FOTO PROFIL (default jika kosong)
    public function getFotoSellerUrlAttribute()
    {
        if ($this->foto_seller) {
            return asset('storage/foto_seller/' . $this->foto_seller);
        }
        return asset('default/default-profile.png'); // path default
    }
}
