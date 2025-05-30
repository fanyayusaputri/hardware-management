<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'siswa'; // Make sure the table name is correct

    protected $fillable = [
        'name',
        'email',
        'nis',
        'kelas',
        'alamat',
        'kartu_pelajar',
        'password',
    ];

    // Add any additional methods or attributes as necessary
}
