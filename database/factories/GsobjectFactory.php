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
    $objectName = $objectNames[rand(0,2)];

    $memberPositions = [
        'Мастер котельной',
        'Главный инженер',
        'Главный энергетик'
    ];
    $memberPosition = $memberPositions[rand(0,2)];

    $grses = [
        'Кашира',
        'Зарайск',
        'Чулки Соколово',
    ];
    $grs = $grses[rand(0,2)];

    return [
        'name'              => $objectName,
        'grs'               => $grs,
        'slug'              => Str::slug($objectName . rand(1000000000,9999999999)),
        'member_position'   => $memberPosition,
        'member_name'       => $faker->name,
        'address'           => $faker->address,
        'stamp_act_date'    => $faker->date(),
        'unit_id'           => rand(1, 5),
        'main_contract_id'  => rand(1, 50),
        'TO_contract_id'    => rand(1, 10),
    ];
});
