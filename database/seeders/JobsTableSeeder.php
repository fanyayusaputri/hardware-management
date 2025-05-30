<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'queue' => 'default',
                'payload' => json_encode(['job' => 'ExampleJob', 'data' => []]),
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => time(),
                'created_at' => time(),
            ],
        ]);
    }
}
