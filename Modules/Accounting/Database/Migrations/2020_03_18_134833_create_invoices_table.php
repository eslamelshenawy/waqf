<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->bigInteger('tenant_id')->unsigned()->index();
            $table->foreign('tenant_id')->references('id')->on('users');

            $table->nullableMorphs('paymentable'); // Fund, Bank, Cheque

            $table->string('payment_mode')->nullable();
            $table->string('order_number')->nullable();
            $table->string('invoice_code')->nullable();
            $table->text('notes')->nullable();
            $table->enum('document_type', ['cash', 'credit'])->default('credit');


            $table->decimal('amount')->default(0);
            $table->decimal('paid_amount')->default(0);
            $table->decimal('remaining_amount')->default(0);

            $table->tinyInteger('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('groups');

            $table->dateTime('order_at')->nullable();
            $table->date('paid_at')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
