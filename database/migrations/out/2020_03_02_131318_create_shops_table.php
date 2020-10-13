<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->char('estate_type')->default('s');
            $table->string('number')->nullable();
            $table->string('space')->nullable();
            $table->bigInteger('building_id')->unsigned()->index();
            $table->foreign('building_id')->references('id')->on('buildings');
            $table->boolean('is_on_street_front')->nullable();
            $table->boolean('is_has_air_conditioner')->nullable();
            $table->integer('number_of_air_conditioner')->nullable();
            $table->string('air_conditioner_brand')->nullable();
            $table->boolean('is_has_decoration')->nullable();
            $table->text('decoration_details')->nullable();
            $table->boolean('is_has_warehouse')->nullable();
            $table->string('warehouse_space')->nullable();
            $table->enum('rent_type', ['monthly', 'quarterly', 'midterm', 'yearly']);
            $table->decimal('price');
            $table->mediumText('extra_details')->nullable();
            $table->boolean('is_has_license')->nullable();
            $table->text('license_notes')->nullable();
            $table->text('commercial_activities')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_available')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
