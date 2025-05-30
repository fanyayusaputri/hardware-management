<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatserversTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('perangkatservers')->insert([
            [
                'gambar' => 'assets/img/7.png', 
                'nama' => 'Server Utama',
                'deskripsi' => 'Server utama untuk database',
                'lokasi' => 'Ruang Server',
                'stok' => 10,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/7.png', 
                'nama' => 'Server Backup',
                'deskripsi' => 'Server backup untuk data',
                'lokasi' => 'Ruang Server',
                'stok' => 5,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
