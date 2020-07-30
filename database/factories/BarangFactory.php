<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'kode'      => 'ATK-00'.$faker->unique()->randomDigitNotNull,
        'nama'      => 'Brg-'.$faker->unique()->word,
        'stok'      => $faker->randomDigitNotNull,
        'status'    => $faker->randomElement(array(true, false)),
        'kode_lokasi' => App\Lokasi::pluck('kode')->random()
    ];
});
