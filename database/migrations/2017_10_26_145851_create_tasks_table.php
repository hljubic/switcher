<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 70);
            $table->date("deadline");
            $table->mediumText("description");
            $table->enum("type", array("seminar paper", "homework", "project"));
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
        Schema::dropIfExists('tasks');
    }
}
