<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('estates')->truncate();

        DB::table('estates')->insert([
            [
                'parent_id' => '',
                'city_id' => '',
                'name' => '',
                'slug' => '',
                'number' => '',
                'floor_number' => '',
                'price' => '',
                'space' => '',
                'district' => '',
                'number_of_rooms' => '',
                'number_of_toilets' => '',
                'number_of_air_conditioner' => '',
                'number_of_apartments' => '',
                'number_of_floors' => '',
                'number_of_shops' => '',
                'is_on_street_front' => '',
                'is_has_decoration' => '',
                'is_kitchen_ready' => '',
                'is_has_air_conditioner' => '',
                'is_has_parking' => '',
                'is_has_warehouse' => '',
                'is_has_license' => '',
                'air_conditioner_brand' => '',
                'estate_type' => '',
                'usage_type' => '',
                'commercial_activities' => '',
                'instrument_number' => '',
                'instrument_date_at' => '',
                'court' => '',
                'construction_license_number' => '',
                'extra_details' => '',
                'license_notes' => '',
                'decoration_details' => '',
                'kitchen_details' => '',
                'warehouse_space' => '',
                'is_active' => '',
                'is_available' => '',
                'unique_id' => '',
                'location' => '',
                'lat' => '',
                'lang' => '',
            ],
            [
                'name' => ''
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
