<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $primaryKey = 'id_driver';

    protected $fillable = [
        'nama_driver',
        'email_driver',
        'password_driver',
        'telp_driver',
        'status_driver',
        'id_detailorder'
    ];
}
