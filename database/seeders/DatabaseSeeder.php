<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        // $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call([
            KategoriSeeder::class,
            RekeningSeeder::class,
            UserSeeder::class,
            VendorSeeder::class,
            KlienSeeder::class,
            EventSeeder::class,
        ]);


    }
}
