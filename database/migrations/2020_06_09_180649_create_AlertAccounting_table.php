<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertAccountingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting_banks', function (Blueprint $table) {
            $table->string('number_account')->nullable();
            $table->decimal('balance')->default(0);
            $table->boolean('is_active')->default(false);

        });
        Schema::table('funds', function (Blueprint $table) {
            $table->decimal('balance')->default(0);
            $table->boolean('is_active')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AlertAccounting');
    }
}
