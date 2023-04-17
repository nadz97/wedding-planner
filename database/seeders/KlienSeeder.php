<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kliens')->insert([
            'id' => 1,
            'user_id' => '4',
            'tanggal_lahir' => '1993-01-25',
            'alamat' => 'Jln.dermaga',
            'kota' => 'jogja',
            'provinsi' => 'Jawa Tengah',
            'kodepos' => '1234',

            'bank' => 'bca',
            'no_rekening' => '010-3330012',
            'nama_rekening' => 'Munaroh',


            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kliens')->insert([
            'id' => 2,
            'user_id' => '5',
            'tanggal_lahir' => '1994-03-25',
            'alamat' => 'Jln.dermaga mana saja',
            'kota' => 'jogja',
            'provinsi' => 'Jawa Tengah',
            'kodepos' => '1213',

            'bank' => 'bca',
            'no_rekening' => '010-4441012',
            'nama_rekening' => 'Manalagi',


            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
