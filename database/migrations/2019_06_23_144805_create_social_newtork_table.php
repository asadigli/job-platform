<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialNewtorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socnet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site'); // facebook, google plus, twitter, youtube, instagram, whatsapp, telegram
            $table->integer('user_id')->nullable();
            $table->integer('res_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('icon');
            $table->string('link');
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
        Schema::dropIfExists('socnet');
    }
}
