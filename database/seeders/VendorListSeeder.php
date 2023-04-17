<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor_list = DB::table('vendor_lists')->insert([
            'id' => '1',
            'vendor_id' => '1',
            'kategori' => 'food',
            'nama_layanan' => 'catering gemilang',
            'harga' => ' 2500000',
            'keterangan' => 'ok',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_lists = DB::table('vendor_lists')->insert([
            'id' => '2',
            'vendor_id' => '1',
            'kategori' => 'room',
            'nama_layanan' => 'sewa gedung gemilang',
            'harga' => ' 9100000',
            'keterangan' => 'sip',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_lists = DB::table('vendor_lists')->insert([
            'id' => '3',
            'vendor_id' => '1',
            'kategori' => 'music',
            'nama_layanan' => 'pagelaran boyband gemilang',
            'harga' => ' 15000000',
            'keterangan' => 'good',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_lists = DB::table('vendor_lists')->insert([
            'id' => '4',
            'vendor_id' => '2',
            'kategori' => 'music',
            'nama_layanan' => 'pagelaran boyband mancanegara',
            'harga' => ' 1900000',
            'keterangan' => 'good',

            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
