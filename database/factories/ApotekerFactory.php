<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Apoteker;
use Faker\Generator as Faker;

$factory->define(Apoteker::class, function (Faker $faker) {

    return [
        'id_user' => $faker->word,
        'id_apotek' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
