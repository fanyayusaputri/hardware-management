<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkatlab1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'nama',
        'tipe',
        'lokasi',
        'stok',
        'status',
        'merek',
        'sn',
        'tipe',
    ];
}
