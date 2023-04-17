<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'nadzar',
            'email' => 'nadzar@gmail.com',
            'password' => Hash::make('nadzar123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => Hash::make('john123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'joe',
            'email' => 'joe@gmail.com',
            'password' => Hash::make('joe123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('users')->insert([
            'id' => 4,
            'name' => 'daniel',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('daniel123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Juni juli',
            'email' => 'juni@gmail.com',
            'password' => Hash::make('juni123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // $admin = User::create([
        //     'id' => 1,
        //     'name' => 'joe',
        //     'email' => 'joe@gmail.com',
        //     'password' => Hash::make('joe123'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $admin->asignRole('admin');

        // $user = User::create([
        //     'id' => 1,
        //     'name' => 'joe',
        //     'email' => 'joe@gmail.com',
        //     'password' => Hash::make('joe123'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $user->asignRole('admin');

    }
}
