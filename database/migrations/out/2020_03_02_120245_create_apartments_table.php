<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateApartmentsTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('apartments', function (Blueprint $table) {
//            $table->bigIncrements('id')->unsigned();
//            $table->char('estate_type')->default('a');
//            $table->string('number');
//            $table->integer('floor_number');
//
////            $table->bigInteger('building_id')->unsigned()->index();
////            $table->foreign('building_id')->references('id')->on('buildings');
//
//            $table->integer('number_of_rooms');
//            $table->string('space')->nullable();
//            $table->integer('number_of_toilets')->unsigned()->nullable();
//            $table->integer('number_of_kitchens')->unsigned()->nullable();
//            $table->boolean('is_has_air_conditioner');
//            $table->integer('number_of_air_conditioner')->nullable();
//            $table->boolean('is_kitchen_ready');
//            $table->text('kitchen_details')->nullable();
//            $table->boolean('is_has_parking')->nullable();
//            $table->string('parking_number')->nullable();
////            $table->enum('rent_type', ['monthly', 'quarterly', 'midterm', 'yearly']);
////            $table->decimal('price')->default(0);
////            $table->mediumText('extra_details')->nullable();
////            $table->boolean('is_active')->default(false);
////            $table->boolean('is_available')->default(false);
////            $table->boolean('is_verified')->default(false);
//            $table->softDeletes();
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('apartments');
//    }
//}
