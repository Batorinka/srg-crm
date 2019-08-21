<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MainContract;
use Faker\Generator as Faker;

$factory->define(MainContract::class, function (Faker $faker) {
    $company_name = $faker->sentence(rand(3, 5), true);

    return [
        'main_contract_type_id' => rand(1, 5),
        'slug'                  => Str::slug($company_name),
        'company_full_name'     => $company_name,
        'company_sub_name'      => $company_name,
        'number'                => $faker->ean8,
        'signing_date'          => $faker->date(),
        'start_date'            => $faker->date(),
        'end_date'              => $faker->date(),
        'contractor_position'   => $faker->jobTitle,
        'contractor_name'       => $faker->name,
        'contractor_cause'      => $faker->colorName,
        'requisites'            => $faker->realText('30'),
        'supply_contract'       => $faker->realText('10'),
        'user_id'               => '1'
    ];
});
