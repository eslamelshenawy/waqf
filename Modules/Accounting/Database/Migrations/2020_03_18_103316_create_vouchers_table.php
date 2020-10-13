<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{

    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nullableUuidMorphs('voucherable');
            $table->enum('document_type', ['Payment', 'Receipt']);
            $table->morphs('paymentable');
            $table->bigInteger('account_id')->unsigned()->index(); /* Account_id */
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->nullableMorphs('attributable'); /* beneficiary_id, tenant_id */
            $table->nullableMorphs('liable_id')->nullable(); /*  liable_id */

            $table->string('date')->nullable();
            $table->string('number')->nullable();
            $table->string('code')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('date_check')->nullable();
            $table->string('check_num')->nullable();
            $table->text('description')->nullable();

            $table->decimal('amount')->default(0);
            $table->tinyInteger('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
