<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{

    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('beneficiary_id')->unsigned();
            $table->foreign('beneficiary_id')
                ->references('id')->on('beneficiaries');
            $table->decimal('amount');
            $table->integer('accepted')->unsigned()->default(0);
            $table->boolean('is_paid')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
