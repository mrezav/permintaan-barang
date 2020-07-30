<?php

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
        $this->call(KaryawanSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
