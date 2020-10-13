<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('identity_number', 10)->unique();
            $table->string('mobile', 10)->unique();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('status', ['pending', 'confirmed', 'suspended'])->default('pending');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('session_token', 6)->nullable();
            $table->boolean('is_authenticated')->default(false);
            $table->mediumInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->date('birth_of_date_at');
            $table->date('release_at');
            $table->date('end_at');
            $table->enum('job', [
                'government_employee',
                'private_sector_employee',
                'businessman',
                'free_business',
                'retired',
                'other'
            ]);
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->string('job_title_other')->nullable();
            $table->enum('marital_status', ['single', 'married', 'widower', 'divorcee']);
            $table->boolean('is_has_kids')->default(false);
            $table->uuid('unique_id')->nullable();
            $table->boolean('is_has_order')->default(false);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
