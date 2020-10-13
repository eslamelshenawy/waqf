<?php

namespace Modules\Accounting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\Group;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();

        DB::table('groups')->truncate();
        DB::table('accounts')->truncate();
        DB::table('funds')->truncate();
        DB::table('banks')->truncate();

        Group::create([
            'title' => 'Waqf Company',
            'description' => 'These waqf company'
        ]);

        DB::transaction(function(){
            DB::table('accounts')->insert([
                [
                    'parent_id' => null,
                    'code' => 100,
                    'name' => 'Income',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => null,
                    'code' => 200,
                    'name' => 'Assets',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => null,
                    'code' => 300,
                    'name' => 'Receivable',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => null,
                    'code' => 500,
                    'name' => 'Outcome',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],

                [
                    'parent_id' => 1,
                    'code' => 101,
                    'name' => 'Sales',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => 2,
                    'code' => 201,
                    'name' => 'Funds',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => 2,
                    'code' => 202,
                    'name' => 'Banks',
                    'type' => 'general_accounts',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => 3,
                    'code' => 301,
                    'name' => 'Tenants',
                    'type' => 'receivables',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ],
                [
                    'parent_id' => 2,
                    'code' => 501,
                    'name' => 'Salaries',
                    'type' => 'profit_and_loss',
                    'debit' => 0,
                    'credit' => 0,
                    'group_id' => 1
                ]
            ]);
        });

//        id, account_id, name, balance, group_id, created_at, updated_at

        Fund::create([
            'account_id' => 6,
            'name' => 'First fund',
            'group_id' => 1
        ]);


        Bank::create([
            'account_id' => 7,
            'name' => 'First Bank',
            'group_id' => 1
        ]);


        Schema::enableForeignKeyConstraints();
    }
}
