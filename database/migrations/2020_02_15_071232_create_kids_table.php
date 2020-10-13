<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKidsTable extends Migration
{

    public function up()
    {
        Schema::create('kids', function (Blueprint $table) {
            $table->uuidMorphs('kidable');
            $table->string('name');
            $table->string('identity_number');
            $table->date('birth_of_date_at');
            $table->enum('gender', ['male', 'female']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('kids');
    }
}
