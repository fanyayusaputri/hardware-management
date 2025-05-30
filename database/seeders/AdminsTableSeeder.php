<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('adminsmkn69'),
                'token' => '692025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('adminsmkn69'),
                'token' => '692025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
