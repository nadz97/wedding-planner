<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
            'id' => 1,
            'prefix' => 'WO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 2,
            'prefix' => 'EV',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
