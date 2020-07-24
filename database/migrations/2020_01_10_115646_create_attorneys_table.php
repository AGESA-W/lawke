<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttorneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attorneys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attorney_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('national_id');
            $table->string('license_no');
            $table->string('mobile');
            $table->string('gender');
            $table->string('image');
            $table->string('county');
            $table->string('practice_area');
            $table->string('token')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('attorney_id')->references('id')->on('lsks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attorneys');
    }
}
