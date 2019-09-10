<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
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
                'title'		=> 'м3/ч',
            ],
            [
                'title'		=> 'С',
            ],
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

        DB::table('units')->insert($data);
    }
}
