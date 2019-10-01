<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
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
                'title'		=> 'свыше 500 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'от 100 до 500 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'от 10 до 100 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'от 1 до 10 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'от 0.1 до 1 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'от 0.01 до 0.1 млн.м3 в год включительно',
            ],
            [
                'title'		=> 'до 10 тыс.м3 в год включительно',
            ],
        ];

        DB::table('groups')->insert($data);
    }
}
