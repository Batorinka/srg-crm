<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TO_contract;
use Faker\Generator as Faker;

$factory->define(TO_contract::class, function (Faker $faker) {

    return [
        'main_contract_id'  => rand(1, 50),
        'slug'              => rand(1000000000,9999999999),
        'number'            => $faker->ean8,
        'payment_period'    => 12,
        'signing_date'      => $faker->date(),
        'start_date'        => $faker->date(),
        'end_date'          => $faker->date(),
    ];
});
