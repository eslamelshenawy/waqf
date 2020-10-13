<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        DB::table('administrators')->truncate();
        DB::table('administrators')->insert([
            [
                'name' => 'Super Administrator',
                'email' => 'super_admin@email.com',
                'password' => bcrypt('password'),
                'is_active' => true
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@email.com',
                'password' => bcrypt('password'),
                'is_active' => true
            ]
        ]);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(PagesTableSeeder::class);
    }
}
