<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Equipment;
use Faker\Generator as Faker;

$factory->define(Equipment::class, function (Faker $faker) {

    $gsobject = '1';

    return [
        'gsobject_id'       => $gsobject,
        'equipment_name_id' => rand(1, 4),
        'quantity'          => rand(1, 5),
        'power'             => '25(1.5)',
    ];
});
