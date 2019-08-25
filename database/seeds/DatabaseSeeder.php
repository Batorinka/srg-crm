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
        $this->call(PressureUnitsTableSeeder::class);
        factory(\App\Models\User::class, 1)->create();
        factory(\App\Models\MainContract::class, 50)->create();
        factory(\App\Models\TO_contract::class, 10)->create();
        factory(\App\Models\Gsobject::class, 50)->create();
    }
}
