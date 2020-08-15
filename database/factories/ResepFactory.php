<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resep;
use Faker\Generator as Faker;

$factory->define(Resep::class, function (Faker $faker) {

    return [
        'id_user_pasien' => $faker->word,
        'id_user_dokter' => $faker->word,
        'id_user_apoteker' => $faker->word,
        'tanggal_resep' => $faker->date('Y-m-d H:i:s'),
        'tanggal_tebus' => $faker->date('Y-m-d H:i:s'),
        'diagnosa' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
