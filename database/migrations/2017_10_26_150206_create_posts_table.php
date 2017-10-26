<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->longText("content");
            $table->integer("conversation_id")->unsigned()->index();
            $table->foreign("conversation_id")->references("id")->on("conversations");
            $table->integer("collegium_id")->unsigned()->index();
            $table->foreign("collegium_id")->references("id")->on("collegiums");
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
        Schema::dropIfExists('posts');
    }
}
