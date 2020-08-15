<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ResepDetail;
use Faker\Generator as Faker;

$factory->define(ResepDetail::class, function (Faker $faker) {

    return [
        'id_resep' => $faker->word,
        'id_obat' => $faker->word,
        'kuantitas' => $faker->word,
        'satuan' => $faker->word,
        'periode' => $faker->word,
        'dalam_sehari' => $faker->word,
        'dalam_sekali' => $faker->word,
        'boleh_berulang' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
