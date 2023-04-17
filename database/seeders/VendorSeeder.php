<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = DB::table('vendors')->insert([
            'id' => 1,
            'user_id' => '2',
            'tanggal_lahir' => '2000-04-23',
            'logo' => 'mastercard.png',
            'bidang' => 'General Manager',
            'perusahaan' => 'PT.Fullsun',
            'alamat' => ('Jl. Pondok Legi 2'),
            'kota' => 'Bandung',
            'provinsi' => ' Jawa Barat',
            'kodepos' => '0423',

            'bank' => 'bca',
            'no_rekening' => '930-8130423',
            'nama_rekening' => 'Lindia Miniarti',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_detail = DB::table('vendor_details')->insert([
            'id' => '1',
            'vendor_id' => '1',
            'kategori' => 'food',
            'nama_layanan' => 'catering gemilang',
            'biaya' => ' 2500000',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_detail = DB::table('vendor_details')->insert([
            'id' => '2',
            'vendor_id' => '1',
            'kategori' => 'room',
            'nama_layanan' => 'sewa gedung gemilang',
            'biaya' => ' 9100000',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_detail = DB::table('vendor_details')->insert([
            'id' => '3',
            'vendor_id' => '1',
            'kategori' => 'music',
            'nama_layanan' => 'pagelaran boyband gemilang',
            'biaya' => ' 15000000',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('vendors')->insert([
            'id' => 2,
            'user_id' => '3',
            'tanggal_lahir' => '2000-04-23',
            'logo' => 'visa.png',
            'bidang' => 'Manager',
            'perusahaan' => 'PT.Moontaeil',
            'alamat' => ('Jl. Waru 1'),
            'kota' => 'Solo',
            'provinsi' => ' Jawa Tengah',
            'kodepos' => '1026',

            'bank' => 'bni',
            'no_rekening' => '813-1026423',
            'nama_rekening' => 'Lindia Miniarti',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_detail = DB::table('vendor_details')->insert([
            'id' => '4',
            'vendor_id' => '2',
            'kategori' => 'music',
            'nama_layanan' => 'pagelaran boyband mancanegara',
            'biaya' => ' 1900000',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        $vendor_detail = DB::table('vendor_details')->insert([
            'id' => '5',
            'vendor_id' => '2',
            'kategori' => 'food',
            'nama_layanan' => 'catering all you can eat',
            'biaya' => ' 2000000',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
