<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Karyawan;
use Faker\Generator as Faker;

$factory->define(Karyawan::class, function (Faker $faker) {
    return [
        'nik' => $faker->unixTime($max='now'),
        'nama' => $faker->name,
        'departemen' => $faker->randomElement(['produksi', 'keuangan', 'marketing', 'personalia'])
    ];
});
