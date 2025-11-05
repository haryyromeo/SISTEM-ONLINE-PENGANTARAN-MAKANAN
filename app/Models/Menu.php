<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'Menu';
    protected $primaryKey = 'id_menu';
    public $timestamps = false;

    protected $fillable = [
        'id_customer', // Sesuai ERD
        'id_seller',   // Sesuai ERD
        'nama_menu',
        'harga_menu',
        'stok_menu',
    ];

    // Relasi: Menu ini milik 1 Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    // Relasi: Menu ini milik 1 Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller', 'id_seller');
    }

    // Relasi: 1 Menu bisa ada di banyak Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_menu', 'id_menu');
    }

    // Relasi: 1 Menu bisa ada di banyak Detail Order
    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'id_menu', 'id_menu');
    }
}