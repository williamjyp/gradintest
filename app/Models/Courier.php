<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{

    protected $fillable = [
        'nama_kurir',
        'level_kurir',
        'alamat_kurir',
        'email_kurir',
        'no_telp_kurir'
    ];
}
