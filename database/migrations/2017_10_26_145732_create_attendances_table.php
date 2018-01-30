<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
                $table->increments('id');
                $table->integer("class_id")->unsigned()->index()->nullable();
                $table->foreign("class_id")->references("id")->on("classes")->onDelete('set null');
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
        Schema::dropIfExists('attendances');
    }
}
