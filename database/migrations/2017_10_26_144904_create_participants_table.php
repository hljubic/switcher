<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("conversation_id")->unsigned()->index()->nullable();
            $table->foreign("conversation_id")->references("id")->on("conversations")->onDelete('set null');
            $table->integer("user_id")->unsigned()->index()->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('set null');
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
        Schema::dropIfExists('participants');
    }
}
