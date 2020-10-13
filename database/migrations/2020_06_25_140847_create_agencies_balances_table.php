<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agencies_id')->unsigned()->index();
            $table->foreign('agencies_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->text('description')->nullable();
            $table->bigInteger('moveId')->nullable();
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
        Schema::dropIfExists('agencies_balances');
    }
}
