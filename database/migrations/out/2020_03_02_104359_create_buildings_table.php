<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateBuildingsTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('buildings', function (Blueprint $table) {
//            $table->bigIncrements('id')->unsigned();
//            $table->char('estate_type')->default('b');
//            $table->string('name');
//            $table->mediumInteger('city_id')->unsigned()->index();
//            $table->foreign('city_id')->references('id')->on('cities');
//            $table->string('district')->nullable();
//            $table->string('street')->nullable();
//            $table->string('number')->nullable();
//            $table->string('space')->nullable();
//            $table->integer('number_of_apartments')->unsigned()->nullable();
//            $table->integer('number_of_floors')->unsigned()->nullable();
//            $table->integer('number_of_shops')->unsigned()->nullable();
//            $table->string('instrument_number')->nullable();
//            $table->string('instrument_date_at')->nullable();
//            $table->string('court')->nullable();
//            $table->string('construction_license_number')->nullable();
//            $table->string('construction_license_date_at')->nullable();
//            $table->set('building_type', ['residential', 'commercial'])->nullable();
//            $table->text('extra_details')->nullable();
//            $table->enum('rent_type', ['monthly', 'quarterly', 'midterm', 'yearly']);
//            $table->decimal('price')->default(0);
//            $table->boolean('is_active')->default(false);
//            $table->boolean('is_available')->default(false);
//            $table->boolean('is_verified')->default(false);
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
//        Schema::dropIfExists('realestates');
//    }
//}
