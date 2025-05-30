<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatRusak extends Model
{
    use HasFactory;

    protected $table = 'perangkat_rusaks';

    protected $fillable = [
        'nama',
        'perangkat',
        'deskripsi',
        'tanggal_ajukan',
        'status',
        'bukti_kerusakan',
    ];

    protected $casts = [
        'tanggal_ajukan' => 'date',
        'status' => 'string',
    ];
}
