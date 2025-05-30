<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Perangkatlab2sTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('perangkatlab2s')->insert([
            [
                'gambar' => 'assets/img/7.png', 
                'nama' => 'PC Client 1',
                'deskripsi' => 'PC client untuk lab 2',
                'lokasi' => 'Lab Sija 2',
                'stok' => 15,
                'status' => 'aktif',
                'tipe' => 'PC',
                'sn' => 'SN234567',
                'merek' => 'Dell',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/7.png', 
                'nama' => 'Printer LaserJet',
                'deskripsi' => 'Printer untuk lab 2',
                'lokasi' => 'Lab Sija 2',
                'stok' => 3,
                'status' => 'aktif',
                'tipe' => 'Printer',
                'sn' => 'SN2345467',
                'merek' => 'HP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
