<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSEOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('page_url');
            $table->string('h1')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('keywords')->nullable();

            $table->text('subtitle')->nullable();
            $table->text('fulldesc')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('weekdays')->nullable();
            $table->string('weekend')->nullable();

            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->string('link3')->nullable();

            $table->string('doptitle1')->nullable();
            $table->text('doptxt1')->nullable();
            $table->string('doptitle2')->nullable();
            $table->text('doptxt2')->nullable();
            $table->string('doptxt3')->nullable();

            $table->text('codkarti')->nullable();
            $table->text('codhtml')->nullable();

            $table->string('hero')->nullable();

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
        Schema::dropIfExists('s_e_o_s');
    }
}
