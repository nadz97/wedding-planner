<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'id' => 1,
            'kategori' => 'weeding',
            'keterangan' => 'kategori weeding',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('kategoris')->insert([
            'id' => 2,
            'kategori' => 'non weeding',
            'keterangan' => 'kategori non-weeding',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
