<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'Detail order'; // Nama dengan spasi
    protected $primaryKey = 'id_detailorder';
    public $timestamps = false;

    protected $fillable = [
        'id_menu',
        'id_order',
        'total_orderan',
    ];

    // Relasi: Detail ini milik 1 Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    // Relasi: Detail ini milik 1 Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }

    // Relasi: 1 Detail Order punya banyak Payment
    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_detailorder', 'id_detailorder');
    }

    // Relasi: 1 Detail Order punya banyak Diskon
    public function diskons()
    {
        return $this->hasMany(Diskon::class, 'id_detail_order', 'id_detailorder');
    }

    // Relasi: 1 Detail Order punya banyak Driver (Penugasan)
    public function drivers()
    {
        return $this->hasMany(Driver::class, 'id_detail_order', 'id_detailorder');
    }
}