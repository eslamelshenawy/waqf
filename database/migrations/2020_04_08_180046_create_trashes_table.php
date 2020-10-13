<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashesTable extends Migration
{

    public function up()
    {
        Schema::create('trashes', function (Blueprint $table) {
            $table->uuidMorphs('trashable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trashes');
    }
}
