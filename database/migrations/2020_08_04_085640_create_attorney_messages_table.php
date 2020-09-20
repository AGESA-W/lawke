<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttorneyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attorney_messages', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('attorney_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('subject');
            $table->string('content');
            $table->boolean('status');
            $table->integer('replied_id')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attorney_messages');
    }
}
