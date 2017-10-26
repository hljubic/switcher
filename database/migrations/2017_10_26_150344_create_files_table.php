<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",50);
            $table->string("path",255);
            $table->mediumText("description");
            $table->bigInteger("size")->unsigned()->index();
            $table->integer("task_id")->unsigned()->index();
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->integer("post_id")->unsigned()->index();
            $table->foreign("post_id")->references("id")->on("posts");
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
        Schema::dropIfExists('files');
    }
}
