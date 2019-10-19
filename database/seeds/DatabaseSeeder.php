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
        $this->call(UnitsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(DeviceTypeTableSeeder::class);
        $this->call(DeviceNameTableSeeder::class);
        $this->call(SetupValuesTableSeeder::class);
        factory(\App\Models\User::class, 1)->create();
        factory(\App\Models\MainContract::class, 20)->create();
        factory(\App\Models\TO_contract::class, 11)->create();
        factory(\App\Models\Gsobject::class, 20)->create();
        factory(\App\Models\StampAct::class, 20)->create();
        factory(\App\Models\Limit::class, 10)->create();
        factory(\App\Models\Device::class, 5)->create();
    }
}
