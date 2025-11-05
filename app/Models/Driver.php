<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'Driver';
    protected $primaryKey = 'id_driver';
    public $timestamps = false;

    protected $fillable = [
        'id_detail_order', // FK baru
        'nama_driver',
        'telp_driver',
        'status_driver',
    ];

    // Relasi: Penugasan Driver ini milik 1 Detail Order
    public function detailOrder()
    {
        return $this->belongsTo(DetailOrder::class, 'id_detail_order', 'id_detailorder');
    }
}