<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'name' => 'fany',
                'email' => 'fany250506@gmail.com',
                'nis' => '111111',
                'kelas' => '10A',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Merdeka No.1',
                'kartu_pelajar' => 'kartu1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'fany ayu',
                'email' => 'fanyayuspt@gmail.com',
                'nis' => '222222',
                'kelas' => '10B',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Sudirman No.2',
                'kartu_pelajar' => 'kartu2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
