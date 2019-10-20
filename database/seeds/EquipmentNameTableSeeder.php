<?php

use Illuminate\Database\Seeder;

class EquipmentNameTableSeeder extends Seeder
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
                'title'		=> 'Котел Baxi',
            ],
            [
                'title'		=> 'Котел Thermona',
            ],
            [
                'title'		=> 'Сушильная печь',
            ],
            [
                'title'		=> 'Хлебопечка',
            ],
            [
                'title'		=> 'Котел Loos',
            ],
        ];

        DB::table('equipment_names')->insert($data);
    }
}
