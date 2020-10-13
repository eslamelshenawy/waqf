<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{

    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('estates');

            $table->mediumInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('number');
            $table->string('floor_number')->nullable();
            $table->string('parking_number')->nullable();

            $table->decimal('price')->default(0);
            $table->integer('space')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();

            $table->integer('number_of_rooms')->unsigned()->nullable();
            $table->integer('number_of_toilets')->unsigned()->nullable();
            $table->integer('number_of_kitchens')->unsigned()->nullable();
            $table->integer('number_of_air_conditioner')->unsigned()->nullable();
            $table->integer('number_of_apartments')->unsigned()->nullable();
            $table->integer('number_of_floors')->unsigned()->nullable();
            $table->integer('number_of_shops')->unsigned()->nullable();

            $table->boolean('is_on_street_front')->nullable();
            $table->boolean('is_has_decoration')->nullable();
            $table->boolean('is_kitchen_ready')->nullable();
            $table->boolean('is_has_air_conditioner')->nullable();
            $table->boolean('is_has_parking')->nullable();
            $table->boolean('is_has_warehouse')->nullable();
            $table->boolean('is_has_license')->nullable();

            $table->string('air_conditioner_brand')->nullable();

            $table->enum('estate_type', ['building', 'apartment', 'shop', 'land']);
            $table->enum('rent_type', ['monthly', 'quarterly', 'midterm', 'yearly'])->nullable();
            $table->set('usage_type', ['residential', 'commercial'])->nullable();
            $table->text('commercial_activities')->nullable();

            $table->string('instrument_number')->nullable();
            $table->string('instrument_date_at')->nullable();
            $table->string('court')->nullable();
            $table->string('construction_license_number')->nullable();
            $table->string('construction_license_date_at')->nullable();

            $table->text('extra_details')->nullable();
            $table->text('license_notes')->nullable();
            $table->text('decoration_details')->nullable();
            $table->text('kitchen_details')->nullable();

            $table->integer('warehouse_space')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_available')->default(false);

            $table->uuid('unique_id')->nullable();

            $table->unique(['number', 'estate_type']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
