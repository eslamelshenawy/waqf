<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->nullableMorphs('transactionable');
            $table->nullableMorphs('attributable');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->tinyInteger('group_id')->unsigned()->index();;
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
