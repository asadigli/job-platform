<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('username')->unique();
            $table->string('title');
            $table->string('email'); //official email
            $table->text('about_me');
            $table->string('image')->default('default.png');
            $table->string('resume')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('status')->default(1); //0 is not active, 1 is active
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
        Schema::dropIfExists('resumes');
    }
}
