<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'status', 'bidang', 'alamat', 'kelurahan', 'kecamatan'
    ];
}
