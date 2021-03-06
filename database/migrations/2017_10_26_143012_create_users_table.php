<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',70);
            $table->string('email',70)->unique();
            $table->string('password',256);
            $table->string('index_number',20)->nullable();
            $table->string('title',20)->nullable();
            $table->string('phone',15)->nullable();
            $table->enum('type', array("admin", "professor", "student", "moderator"))->default('student');
            $table->boolean('is_active')->nullable();
            $table->integer('study_id')->unsigned()->index()->nullable();
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('set null');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
