<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_areas', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('attorney_id')->unsigned();
            $table->string('area_practice');
            

            $table->foreign('attorney_id')->references('attorney_id')->on('lsks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_areas');
    }
}
