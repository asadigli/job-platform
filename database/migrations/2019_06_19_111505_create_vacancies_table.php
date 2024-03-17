<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang')->default('en');
            $table->integer('vac_id')->unique();
            $table->string('token')->unique();
            $table->text('title');
            $table->integer('status')->default(0);
            $table->text('description');
            $table->text('requirements');
            $table->string('company');
            $table->integer('type'); //0 - intern, 1 - parttime, 2 - fulltime, 3 - remote
            $table->string('location');
            $table->integer('category');
            $table->string('website')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image')->nullable();
            $table->string('contact_type')->default(1); // 0 is via phone, 1 is via email, 2 is via both, 3 is via portal
            $table->string('contact_email');
            $table->string('contact_number')->nullable();
            $table->integer('salary')->default(0); //0 means it is discussable
            $table->integer('salary_type')->default(1); //0 is hourly, 1 is monthly, 2 is annual, 3 is daily
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
        Schema::dropIfExists('vacancies');
    }
}
