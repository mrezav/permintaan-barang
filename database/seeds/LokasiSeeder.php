<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = ['L1-R1A', 'L2-R2A', 'L3-R3A'];
        $names = ['Gudang Barat', 'Gudang Timur', 'Gudang Utara'];

        for($i = 0; $i < 3 ; $i++){
            DB::table('lokasi')->insert([
                'kode' => $codes[$i],
                'nama' => $names[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
