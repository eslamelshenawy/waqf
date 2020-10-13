<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{

    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->enum('type', ['person', 'agency']);
            $table->string('identity_number', 10)->unique();
            $table->string('mobile', 10)->unique();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('status', ['pending', 'confirmed', 'suspended'])->default('pending');
            $table->enum('user_type', ['مورد', 'خدمات'])->default('مورد');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('session_token', 6)->nullable();
            $table->boolean('is_authenticated')->default(false);

            $table->mediumInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->text('address')->nullable();
            $table->set('services', [
                'electric',
                'plumber',
                'carpenter',
                'painter',
                'paving',
                'transfer_furniture',
                'uploading_and_downloading',
                'cleaning',
                'other'
            ]);
            $table->string('service_other')->nullable();
            $table->boolean('is_available')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->uuid('unique_id')->nullable();

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}
