<?php

namespace Modules\Accounting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AccountingDatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();
//        $this->call(AccountsTableSeeder::class);
    }
}
