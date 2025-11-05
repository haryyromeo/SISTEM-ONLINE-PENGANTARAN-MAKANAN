<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report'; 
    protected $primaryKey = 'id_report'; 
    public $timestamps = false; 

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'id_admin',
        'tanggal_report',
        'jenis_report', 
        'detail_report'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}