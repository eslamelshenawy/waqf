<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBalancesTable extends Migration
{

    public function up()
    {
        Schema::create('bank_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_id')->unsigned()->index();
            $table->foreign('bank_id')->references('id')->on('accounting_banks')->onDelete('cascade');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_balances');
    }
}
