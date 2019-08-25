<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gsobject;
use Faker\Generator as Faker;

$factory->define(Gsobject::class, function (Faker $faker) {
    $objectNames = [
        'Котельная',
        'ГРП',
        'Цех'
    ];
    $objectName = $objectNames[rand(1,3)];

    $memberPositions = [
        'Мастер котельной',
        'Главный инженер',
        'Главный энергетик'
    ];
    $memberPosition = $memberPositions[rand(1,3)];

    $grses = [
        'Кашира',
        'Зарайск',
        'Чулки Соколово',
    ];
    $grs = $grses[rand(1,3)];

    return [
        'name'              => $objectName,
        'grs'               => $grs,
        'slug'              => Str::slug($objectName . rand(1000,9999)),
        'member_position'   => $memberPosition,
        'member_name'       => $faker->name,
        'address'           => $faker->address,
        'stamp_act_date'    => $faker->date(),
        'pressure_unit_id'  => rand(1, 5),
        'main_contract_id'  => rand(1, 50),
        'TO_contract_id'    => rand(1, 50),
    ];
});
