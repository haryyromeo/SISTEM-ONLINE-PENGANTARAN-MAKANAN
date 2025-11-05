<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'Payment';
    protected $primaryKey = 'id_payment';
    public $timestamps = false;

    protected $fillable = [
        'id_detailorder', // Berubah dari id_order
        'metode_pemb',
        'diskon',
        'ongkos_kirim',
        'total_harga',
    ];

    // Relasi: Payment ini milik 1 Detail Order
    public function detailOrder()
    {
        return $this->belongsTo(DetailOrder::class, 'id_detailorder', 'id_detailorder');
    }
}