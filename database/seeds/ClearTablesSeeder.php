<?php

use Illuminate\Database\Seeder;

class ClearTablesSeeder extends Seeder
{

    public function run()
    {
        $tables = [
            'model_has_roles',
            'model_has_permissions',
            'role_has_permissions',
            'permissions',
            'roles',
            'building',
            'users',
            'tenants',
            'beneficiaries',
            'members',
            'agencies'
        ];
    }
}
