<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Apotek;
use Faker\Generator as Faker;

$factory->define(Apotek::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'alamat' => $faker->word,
        'nomor_izin' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
