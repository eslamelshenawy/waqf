<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('journal_details', function (Blueprint $table) {
            $table->bigInteger('journal_id')->unsigned()->index();
            $table->foreign('journal_id')->references('id')->on('journals');
            $table->bigInteger('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->tinyInteger('group_id')->unsigned()->index();;
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
