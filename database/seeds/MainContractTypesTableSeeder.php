<?php

use Illuminate\Database\Seeder;

class MainContractTypesTableSeeder extends Seeder
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
                'title'		=> 'Договор',
            ],
            [
                'title'		=> 'Государственный контракт',
            ],
            [
                'title'		=> 'Муниципальный контракт',
            ],
            [
                'title'		=> 'Контракт',
            ],
            [
                'title'		=> 'Техническое соглашение',
            ],
        ];

        DB::table('main_contract_types')->insert($data);
    }
}
