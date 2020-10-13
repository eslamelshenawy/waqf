<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(ClearTablesSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ClearStorage::class);
        $this->call(Orchestra::class);
    }
}
