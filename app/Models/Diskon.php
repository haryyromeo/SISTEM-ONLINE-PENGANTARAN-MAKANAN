<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'Diskon';
    protected $primaryKey = 'id_diskon';
    public $timestamps = false;

    protected $fillable = [
        'id_detail_order',
        'id_seller',
        'total_diskon',
    ];

    // Relasi: Diskon ini milik 1 Detail Order
    public function detailOrder()
    {
        return $this->belongsTo(DetailOrder::class, 'id_detail_order', 'id_detailorder');
    }

    // Relasi: Diskon ini milik 1 Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller', 'id_seller');
    }
}