<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Advance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('beneficiary_id')->unsigned()->index()->nullable();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->decimal('amount')->default(0);
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_done')->default(false);
            $table->date('date_pay')->nullable();
            $table->date('date_done')->nullable();
            $table->text('reason_advance')->nullable();
            $table->string('number_advance')->nullable();
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
        Schema::dropIfExists('Advance');
    }
}
