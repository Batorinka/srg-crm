<?php

use Illuminate\Database\Seeder;

class SetupValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'zero_group'        => '354.64',
                'first_group'       => '375.10',
                'second_group'      => '545.60',
                'third_group'       => '748.02',
                'fourth_group'      => '774.89',
                'fifth_group'       => '825.22',
                'sixth_group'       => '900.24',
                'special_increase'  => '150.96',
            ],
        ];

        DB::table('setup_values')->insert($data);
    }
}
