<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->boolean('seen/unseen')->nullable();
            $table->integer('conversation_id')->unsigned()->index()->nullable();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('set null');
            $table->integer('sender_id')->unsigned()->index()->nullable();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
