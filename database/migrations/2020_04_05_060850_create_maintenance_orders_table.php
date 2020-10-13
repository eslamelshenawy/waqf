<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('maintenance_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_number', 250)->nullable();
            $table->string('apartmentId', 250)->nullable();
            $table->bigInteger('agency_id')->unsigned()->index()->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->bigInteger('tenant_id')->unsigned()->index()->nullable();
            $table->foreign('tenant_id')->references('id')->on('users');
            $table->bigInteger('estate_id')->unsigned()->nullable();
            $table->foreign('estate_id')->references('id')->on('estates');
            $table->mediumInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->decimal('amount')->default(0);
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_done')->default(false);
            $table->text('description')->nullable();
            $table->dateTime('available_at')->nullable();
            $table->dateTime('ended_at')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('maintenance_orders');
    }
}
