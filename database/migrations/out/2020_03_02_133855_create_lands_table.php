<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{

    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->char('estate_type')->default('l');
            $table->string('number')->nullable();
            $table->string('location')->nullable();
            $table->string('space')->nullable();
            $table->string('price')->nullable();
            $table->string('instrument_number');
            $table->string('instrument_date_at');
            $table->string('court')->nullable();
            $table->mediumInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->set('land_type', ['residential', 'commercial'])->nullable();
            $table->text('extra_details')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_available')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
