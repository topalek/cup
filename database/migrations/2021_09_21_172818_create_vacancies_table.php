<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->string('experience');
            $table->string('workload_short'); //
            $table->string('workload_full'); // занятость
            $table->string('city');
            $table->integer('salary')->unsigned();
            $table->text('responsibility'); // обязанности
            $table->text('requirements'); // требования
            $table->text('conditions'); // условия
            
            $table->date('datepub')->nullable();
            $table->string('url');
            $table->string('description')->nullable();
            $table->text('keywords')->nullable();
            
            $table->boolean('active')->default(true);
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
