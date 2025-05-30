<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';
    
    protected $fillable = [
        'user_id',
        'nama', 
        'kelas',
        'no_telepon', 
        'nama_perangkat', 
        'jumlah_perangkat',
        'tanggal_peminjaman', 
        'persetujuan', 
        'tanggal_pengembalian',
        
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }

    protected $casts = [
        'tanggal_peminjaman' => 'datetime',
    ];
}
