<?php

use App\Models\Device;
use App\Models\Gsobject;
use App\Models\Limit;
use App\Models\MainContract;
use App\Models\StampAct;
use App\Models\TO_contract;
use App\Models\User;
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
        $this->call(EquipmentNameTableSeeder::class);
        $this->call(SetupValuesTableSeeder::class);
        factory(User::class, 1)->create();
        factory(MainContract::class, 20)->create();
        factory(TO_contract::class, 11)->create();
        factory(Gsobject::class, 20)->create();
        factory(StampAct::class, 20)->create();
        factory(Limit::class, 10)->create();
        factory(Device::class, 5)->create();
    }
}
