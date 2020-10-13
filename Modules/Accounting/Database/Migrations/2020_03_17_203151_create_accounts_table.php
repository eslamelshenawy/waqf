<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->unsignedBigInteger('sorting')->unique()->nullable();
            $table->bigInteger('code')->unique()->unsigned();
            $table->string('name');
            $table->enum('type', ['رئيسى','رئيسى1', 'رئيسى2', 'رئيسى3', 'فرعى'])->default('رئيسى1');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->decimal('debitFrist')->default(0);
            $table->decimal('creditFirst')->default(0);
            $table->decimal('balance')->default(0);
            $table->tinyInteger('group_id')->unsigned()->index();
            $table->string('typeMenu')->nullable();
            $table->string('typeAccountMenu')->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
