<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice')->insert([
            'id' => 1,
            'series_id' => 2,
            'number' => 1,
            'customer' => 'Daniel',
            'total' => 1000000,
            'cicilan' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('invoice')->insert([
            'id' => 2,
            'series_id' => 1,
            'number' => 1,
            'customer' => 'Bambang',
            'total' => 1500000,
            'cicilan' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
