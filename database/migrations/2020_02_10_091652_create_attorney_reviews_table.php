<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttorneyReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attorney_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('attorney_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('headline');
            $table->mediumText('description');
            $table->string('consultation');
            $table->string('recommend');
            $table->integer('rating');
            $table->tinyInteger('approved')->nullable();
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
        Schema::dropIfExists('attorney_reviews');
    }
}
