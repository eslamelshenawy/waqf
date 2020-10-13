<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{

    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->uuidMorphs('imageable');
//            $table->morphs('imageable');
            $table->string('name');
            $table->string('more')->nullable();
//            $table->integer('imageable_id')->unsigned();
//            $table->string('imageable_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
