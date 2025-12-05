<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'nama_customer',
        'email_customer',
        'password_customer',
        'alamat_customer',
        'telp_customer',
    ];

    protected $hidden = [
        'password_customer',
    ];

    // Laravel default pakai kolom "password"
    public function getAuthPassword()
    {
        return $this->password_customer;
    }
}
