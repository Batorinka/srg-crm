<?php

use Illuminate\Database\Seeder;

class DeviceTypeTableSeeder extends Seeder
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
                'title'		=> 'Счетчик(Расходомер)',
            ],
            [
                'title'		=> 'Корректор',
            ],
            [
                'title'		=> 'Датчик давления',
            ],
            [
                'title'		=> 'Датчик температуры',
            ],
            [
                'title'		=> 'Датчик перепада давления',
            ],
            [
                'title'		=> 'Сужающее устройство',
            ],
            [
                'title'		=> 'Измерительный комплекс',
            ],
        ];

        DB::table('device_types')->insert($data);
    }
}
