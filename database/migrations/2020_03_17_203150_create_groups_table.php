<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{

    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('manager_primary')->nullable();
            $table->string('manager_secondary')->nullable();
            $table->date('start_financial_date_at')->nullable();
            $table->date('end_financial_date_at')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
