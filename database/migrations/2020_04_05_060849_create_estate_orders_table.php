<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('estate_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('estate_id')->unsigned()->index();
            $table->foreign('estate_id')->references('id')->on('estates');

            $table->enum('order_type', ['rent', 'owning'])->default('rent');
            $table->string('order_number', 250);
            $table->bigInteger('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')
                ->on('users');

            $table->decimal('amount')->unsigned();
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_ended')->default(false);
            $table->integer('rent_period')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->date('rented_at');
            $table->date('ended_at');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('estate_orders');
    }
}
