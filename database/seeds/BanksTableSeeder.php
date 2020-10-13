<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('banks')->truncate();

        DB::table('banks')->insert([
            [
                'name' => 'First Bank'
            ],
            [
                'name' => 'Second Bank'
            ],
            [
                'name' => 'Third Bank'
            ],
            [
                'name' => 'Fourth Bank'
            ]
        ]);
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
