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
            $table->string("path",255)->nullable();
            $table->mediumText("description")->nullable();
            $table->bigInteger("size")->unsigned()->index();
            $table->integer("task_id")->unsigned()->index()->nullable();
            $table->foreign("task_id")->references("id")->on("tasks")->onDelete('set null');
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
