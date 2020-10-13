<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderBalance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('beneficiary_id')->unsigned()->index()->nullable();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->text('reason')->nullable();
            $table->boolean('is_accepted')->default(false);
            $table->text('admin_commit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderBalance');
    }
}
