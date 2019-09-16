<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StampAct;
use Faker\Generator as Faker;

$factory->define(StampAct::class, function (Faker $faker) {

    $places = [
        'Корректор',
        'Счетчик',
        'Датчик давления',
        'Датчик температуры',
        'Датчик перепада давления',
    ];
    $place = $places[rand(0,4)];

    return [
        'gsobject_id'       => rand(1, 10),
        'place'             => $place,
        'number'            => $faker->ean8,
    ];
});
