<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
