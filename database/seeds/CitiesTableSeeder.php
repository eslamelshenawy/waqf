<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('cities')->truncate();

        $numberOfCities = 5;

        $cities_en = [
            'jeddah',
            'riyadh',
            'dammam',
            'madina',
            'makkha'
        ];

        $cities_ar = [
            'جدة',
            'الرياض',
            'الدمام',
            'المدينة',
            'مكة'
        ];

        for($i=0; $i<$numberOfCities; $i++){
            DB::table('cities')->insert([
                [
                    'name_en' => $cities_en[$i],
                    'name_ar' => $cities_ar[$i]
                ]
            ]);
        }

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
