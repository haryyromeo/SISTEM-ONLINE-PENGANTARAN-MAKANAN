<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery'; 
    protected $primaryKey = 'id_delivery'; 
    public $timestamps = false; 

    protected $fillable = [
        'id_order',
        'id_driver',
        'status_delivery', 
        'waktu_delivery'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver', 'id_driver');
    }
}