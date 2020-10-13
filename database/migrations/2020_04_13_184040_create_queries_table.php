<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{

    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 8)->unique();
            $table->string('name', 100);
            $table->string('mobile', 10);
            $table->bigInteger('estate_id')->unsigned();
            $table->foreign('estate_id')->references('id')->on('estates');
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
