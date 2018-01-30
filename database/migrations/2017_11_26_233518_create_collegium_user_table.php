<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegiumUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegium_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("collegium_id")->unsigned()->index()->nullable();
            $table->foreign("collegium_id")->references("id")->on("collegiums")->onDelete('set null');
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
        Schema::dropIfExists('collegium_user');
    }
}
