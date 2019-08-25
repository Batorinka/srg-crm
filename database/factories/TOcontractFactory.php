<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TO_contract;
use Faker\Generator as Faker;

$factory->define(TO_contract::class, function (Faker $faker) {
    $mainContractName = (App\Models\MainContract::class)->company_sub_name;

    return [
        'main_contract_id'  => rand(1, 50),
        'slug'              => Str::slug($mainContractName . 'TO'),
        'number'            => $faker->ean8,
        'payment_period'    => 12,
        'signing_date'      => $faker->date(),
        'start_date'        => $faker->date(),
        'end_date'          => $faker->date(),
    ];
});
