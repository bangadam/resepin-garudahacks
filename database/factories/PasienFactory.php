<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pasien;
use Faker\Generator as Faker;

$factory->define(Pasien::class, function (Faker $faker) {

    return [
        'id_user' => $faker->word,
        'dob' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
