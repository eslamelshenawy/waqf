<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    const CRUD = ['create', 'read', 'update', 'delete'];
    const LETTERS = ['y'];

    public function run()
    {
        /*
         * Author: Eslam Elshenawy
         *
         * */

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        DB::table('permissions')->truncate();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = getModels();

        foreach($models as $model){
            $model = strtolower(str_replace('.php', '', $model));

            if( in_array($model[-1],  self::LETTERS) ){
                foreach(self::LETTERS as $letter){
                    $model = str_replace($letter, 'ies', $model);
                }
            }else{
                $model = $model . 's';
            }

            foreach(range(0, count(self::CRUD) - 1) as $index) {
                Permission::create(
                    [
                        'guard_name' => 'admin',
                        'name' => self::CRUD[$index] . ' ' . $model
                    ]
                );
            }
        }

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

    }
}

