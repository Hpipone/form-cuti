<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tanggal',
        'nomor_darurat',
        'alasan',
        'lama_cuti'
    ];
}
