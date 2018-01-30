<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegiumStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegium_study', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collegium_id')->unsigned()->index()->nullable();
            $table->foreign('collegium_id')->references("id")->on("collegiums")->onDelete('set null');
            $table->integer('study_id')->unsigned()->index()->nullable();
            $table->foreign('study_id')->references("id")->on("studies")->onDelete('set null');
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
        Schema::dropIfExists('collegium_study');
    }
}
