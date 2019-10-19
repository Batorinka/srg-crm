<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Device;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {

    $gsobject = '1';

    return [
        'gsobject_id'       => $gsobject,
        'device_name_id'    => rand(1, 4),
        'number'            => $faker->ean8,
        'last_muster_date'  => $faker->date(),
        'muster_interval'   => rand(1, 5),
        'range'             => '1...5',
    ];
});
