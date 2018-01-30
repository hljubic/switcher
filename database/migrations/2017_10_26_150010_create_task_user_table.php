<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->increments('id');
            $table->enum("status", array("in progress", "finished", "not finished"));
            $table->integer("task_id")->unsigned()->index()->nullable();
            $table->integer("user_id")->unsigned()->index()->nullable();
            $table->foreign("task_id")->references("id")->on("tasks")->onDelete('set null');
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
        Schema::dropIfExists('task_user');
    }
}
