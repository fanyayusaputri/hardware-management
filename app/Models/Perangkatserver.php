<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkatserver extends Model
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
    ];
}
