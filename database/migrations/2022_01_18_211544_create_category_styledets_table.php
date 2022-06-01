<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryStyledetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('category_styledets', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('url')->nullable();
          $table->text('shortdesc')->nullable();
          $table->text('desc')->nullable();
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
        Schema::dropIfExists('category_styledets');
    }
}
