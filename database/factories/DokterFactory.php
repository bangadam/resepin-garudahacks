<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dokter;
use Faker\Generator as Faker;

$factory->define(Dokter::class, function (Faker $faker) {

    return [
        'id_user' => $faker->word,
        'sip' => $faker->word,
        'str' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
