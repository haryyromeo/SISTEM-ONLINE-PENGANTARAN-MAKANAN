<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_seller';

    protected $fillable = [
        'nama_seller',
        'alamat_seller',
        'telp_seller',
        'email_seller',
        'password_seller',
        'foto_seller',
    ];

    protected $hidden = [
        'password_seller',
    ];
}
