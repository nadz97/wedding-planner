<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekenings')->insert([
            'id' => 1,
            'bank' => 'bca',
            'no_rekening' => '010-0084502',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 2,
            'bank' => 'bca',
            'no_rekening' => '010-0084503',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 3,
            'bank' => 'bca',
            'no_rekening' => '010-0084504',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 4,
            'bank' => 'bca',
            'no_rekening' => '010-0084505',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 6,
            'bank' => 'bca',
            'no_rekening' => '010-0084507',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 7,
            'bank' => 'bca',
            'no_rekening' => '010-0084508',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 8,
            'bank' => 'bca',
            'no_rekening' => '010-0084509',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 9,
            'bank' => 'bca',
            'no_rekening' => '010-0084510',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 10,
            'bank' => 'bca',
            'no_rekening' => '010-0084511',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 11,
            'bank' => 'bca',
            'no_rekening' => '010-0084512',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rekenings')->insert([
            'id' => 12,
            'bank' => 'bca',
            'no_rekening' => '010-0084513',
            'nama_rekening' => 'Lindia Miniarti',



            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
