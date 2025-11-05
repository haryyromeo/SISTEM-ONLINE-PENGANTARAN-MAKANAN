<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'Order';
    protected $primaryKey = 'id_order';
    public $timestamps = false; // Menggunakan tanggal_order

    protected $fillable = [
        'id_menu',      // Sesuai ERD
        'id_customer',  // Sesuai ERD
        'tanggal_order',
        'status_order',
    ];

    // Relasi: Order ini milik 1 Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    // Relasi: Order ini milik 1 Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    // Relasi: 1 Order punya banyak Detail Order
    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'id_order', 'id_order');
    }
}