<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{

    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nullableMorphs('journalable');
            $table->string('number')->nullable();
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->tinyInteger('group_id')->unsigned()->index();;
            $table->foreign('group_id')->references('id')->on('groups');
            $table->text('details')->nullable();
            $table->date('date_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
