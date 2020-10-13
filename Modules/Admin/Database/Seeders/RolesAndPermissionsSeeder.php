<?php


namespace Modules\Admin\Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        Schema::disableForeignKeyConstraints();
        $tables = [
            'model_has_roles',
            'model_has_permissions',
            'role_has_permissions',
            'permissions',
            'roles'
        ];
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        \Spatie\Permission\Models\Role::create([
            'name' => 'super-admin',
            'guard_name' => 'admin'
        ]);
        $admin = \Modules\Admin\Entities\Administrator::first();
        $admin->assignRole('super-admin');
        Schema::enableForeignKeyConstraints();
    }
}
