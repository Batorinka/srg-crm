<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Limit;
use Faker\Generator as Faker;

$factory->define(Limit::class, function (Faker $faker) {

    $years = [
        '2019',
        '2020',
        '2021',
        '2022',
    ];
    $year = $years[rand(0,3)];

    return [
        'gsobject_id'   => rand(1,10),
        'group_id'      => rand(1,5),
        'year'          => $year,
        'supplier'      => 'ООО «Газпром межрегионгаз Москва»',
        'jan_4'         => '0.000',
        'feb_4'         => '0.000',
        'mar_4'         => '0.000',
        'apr_4'         => '0.000',
        'may_4'         => '0.000',
        'jun_4'         => '0.000',
        'jul_4'         => '0.000',
        'aug_4'         => '0.000',
        'sep_4'         => '0.000',
        'oct_4'         => '0.000',
        'nov_4'         => '0.000',
        'dec_4'         => '0.000',
        'jan_8'         => '0.000',
        'feb_8'         => '0.000',
        'mar_8'         => '0.000',
        'apr_8'         => '0.000',
        'may_8'         => '0.000',
        'jun_8'         => '0.000',
        'jul_8'         => '0.000',
        'aug_8'         => '0.000',
        'sep_8'         => '0.000',
        'oct_8'         => '0.000',
        'nov_8'         => '0.000',
        'dec_8'         => '0.000',
        'jan_10'         => '0.000',
        'feb_10'         => '0.000',
        'mar_10'         => '0.000',
        'apr_10'         => '0.000',
        'may_10'         => '0.000',
        'jun_10'         => '0.000',
        'jul_10'         => '0.000',
        'aug_10'         => '0.000',
        'sep_10'         => '0.000',
        'oct_10'         => '0.000',
        'nov_10'         => '0.000',
        'dec_10'         => '0.000',
    ];
});
