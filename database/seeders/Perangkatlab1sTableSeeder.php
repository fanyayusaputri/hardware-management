<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Perangkatlab1sTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('perangkatlab1s')->insert([
            [
                'gambar' => 'assets/img/7.png',
                'nama' => 'Router Cisco',
                'deskripsi' => 'Router untuk lab 1',
                'lokasi' => 'Lab Sija 1',
                'stok' => 7,
                'status' => 'aktif',
                'tipe' => 'Router',
                'sn' => 'SN123456',
                'merek' => 'Cisco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/7.png',
                'nama' => 'Switch HP',
                'deskripsi' => 'Switch untuk lab 1',
                'lokasi' => 'Lab Sija 1',
                'stok' => 12,
                'status' => 'aktif',
                'tipe' => 'Switch',
                'sn' => 'SN789101',
                'merek' => 'HP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
