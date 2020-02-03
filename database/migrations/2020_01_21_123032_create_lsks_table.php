<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsks', function (Blueprint $table) {
            $table->increments('attorney_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('gender');
             $table->string('mobile');
             $table->mediumText('county');
             $table->integer('national_id')->unsigned();;
            $table->string('license_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lsks');
    }
}
