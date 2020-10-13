<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerallSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GenerallSetting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title_ar')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('site_mobile')->nullable();
            $table->integer('site_phone')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram')->nullable();
            $table->string('site_whatup')->nullable();
            $table->text('site_aboutus_ar')->nullable();
            $table->string('site_addresse_ar')->nullable();
            $table->string('playStoreLink')->nullable();
            $table->string('aplleStoreLink')->nullable();
            $table->string('logoImage')->nullable();

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
        Schema::dropIfExists('GenerallSetting');
    }
}
