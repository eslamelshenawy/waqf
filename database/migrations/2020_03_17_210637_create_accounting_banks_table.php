<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingBanksTable extends Migration
{

    public function up()
    {
        Schema::create('accounting_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('name');
            $table->tinyInteger('group_id')->unsigned()->index();;
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accounting_banks');
    }
}
