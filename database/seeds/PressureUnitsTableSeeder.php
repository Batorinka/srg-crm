<?php

use Illuminate\Database\Seeder;

class PressureUnitsTableSeeder extends Seeder
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
                'title'		=> 'кгс/см2',
            ],
            [
                'title'		=> 'кгс/м2',
            ],
            [
                'title'		=> 'МПа',
            ],
            [
                'title'		=> 'кПа',
            ],
            [
                'title'		=> 'Па',
            ],
            [
                'title'		=> 'bar',
            ],
            [
                'title'		=> 'mbar',
            ],
        ];

        DB::table('pressure_units')->insert($data);
    }
}
