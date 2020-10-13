<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->nullable();
            $table->string('code')->nullable();

            $table->bigInteger('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->nullableMorphs('attributable');

            $table->bigInteger('bank_id')->unsigned()->index();
            $table->foreign('bank_id')->references('id')->on('accounting_banks');

            $table->decimal('amount')->default(0);

            $table->tinyInteger('group_id')->unsigned()->index();;
            $table->foreign('group_id')->references('id')->on('groups');

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
        Schema::dropIfExists('cheques');
    }
}
