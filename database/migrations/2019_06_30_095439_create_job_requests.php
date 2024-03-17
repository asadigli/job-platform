<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobreq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('res_id')->nullable();
            $table->integer('vac_id');
            $table->integer('application_id')->unique();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('resume')->nullable();
            $table->string('cover_letter')->nullable();
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
        Schema::dropIfExists('jobreq');
    }
}
