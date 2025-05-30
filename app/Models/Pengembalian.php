<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'pengembalian';

    protected $fillable = [
        'peminjaman_id',
        'user_id',
        'nama',
        'kelas',
        'jumlah_perangkat',
        'tanggal_pengembalian',
        'status_pengembalian',
        'bukti_pengembalian',
        'alasan_belum_dikembalikan'
    ];
    
    
    // Relasi dengan tabel peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
