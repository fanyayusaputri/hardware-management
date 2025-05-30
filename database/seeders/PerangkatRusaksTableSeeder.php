<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatRusaksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('perangkat_rusaks')->insert([
            [
                'nama' => 'Fany',
                'perangkat' => 'Router Cisco',
                'deskripsi' => 'Router tidak bisa nyala',
                'tanggal_ajukan' => now()->toDateString(),
                'status' => 'DI PERIKSA',
                'bukti_kerusakan' => 'assets/img/7.png', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yuli',
                'perangkat' => 'PC Client 1',
                'deskripsi' => 'PC sering restart sendiri',
                'tanggal_ajukan' => now()->toDateString(),
                'status' => 'DI PERBAIKI',
                'bukti_kerusakan' => 'assets/img/7.png', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
