<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Tetap gunakan ini untuk login
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Customer';
    protected $primaryKey = 'id_customer';
    public $timestamps = false;

    protected $fillable = [
        'nama_customer',
        'email_customer',
        'password_customer',
        'alamat_customer',
        'telp_customer',
    ];

    protected $hidden = [
        'password_customer',
    ];

    // Relasi: 1 Customer punya banyak Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_customer', 'id_customer');
    }

    // Relasi: 1 Customer (anehnya) punya banyak Menu, sesuai diagram
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_customer', 'id_customer');
    }
}