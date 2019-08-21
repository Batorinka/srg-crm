<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return voidfirst commit
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MainContractTypesTableSeeder::class);
        factory(\App\Models\User::class, 1)->create();
        factory(\App\Models\MainContract::class, 50)->create();
    }
}
