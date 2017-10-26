<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegiums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->mediumText('description');
            $table->integer('prof_id')->unsigned()->index();
            $table->foreign('prof_id')->references('id')->on('users');
            $table->integer('assist_id')->unsigned()->index();
            $table->foreign('assist_id')->references('id')->on('users');
            $table->integer('conversation_id')->unsigned()->index();
            $table->foreign('conversation_id')->references('id')->on('conversations');
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
        Schema::dropIfExists('collegiums');
    }
}
