<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'id' => 1,
            'kategori_id' => 1,
            'klien_id' => '1',
            'rekening_id' => '1',
            'nama_event' => 'Pernikahan',
            'tanggal' => '2022-04-21',
            'dp' => 100000000,
            'keterangan' => 'anak pak madi',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('events')->insert([
            'id' => 2,
            'kategori_id' => 2,
            'klien_id' => '2',
            'rekening_id' => '2',
            'nama_event' => 'Pernikahan juga',
            'tanggal' => '2022-05-11',
            'dp' => 100000000,
            'keterangan' => 'anak pak madi yg satunya',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
