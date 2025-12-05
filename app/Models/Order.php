<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
    'id_customer', 'id_seller', 'id_menu', 'jumlah', 'alamat',
    'total_harga', 'biaya_pengiriman', 'biaya_layanan',
    'total_keseluruhan', 'tanggal_order', 'status_order'
];



    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function seller() {
        return $this->belongsTo(\App\Models\Seller::class, 'id_seller', 'id_seller');
    }

    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'id_customer', 'id_customer');
    }
}
