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
            $table->integer("conversation_id")->unsigned()->index()->nullable();
            $table->foreign("conversation_id")->references("id")->on("conversations");
            $table->integer("collegium_id")->unsigned()->index()->nullable();
            $table->foreign("collegium_id")->references("id")->on("collegiums");
            $table->integer("user_id")->unsigned()->index()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->integer("file_id")->unsigned()->index()->nullable();
            $table->foreign("file_id")->references("id")->on("files");
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

