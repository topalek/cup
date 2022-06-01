<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('kolperson')->nullable();
            $table->string('mestoprov')->nullable();
            $table->date('dataprov')->nullable();
            $table->string('formatprov')->nullable();
            $table->string('linkvideo')->nullable();
            $table->boolean('active')->default(true);
            $table->text('doptxt')->nullable();
            //стили проведения для взрослых
            //$table->foreignId('category_stylevz_id')->constrained()->nullable();
            //стили проведения для детей
            //$table->foreignId('category_styledet_id')->constrained()->nullable();
            /*на главную*/
            $table->boolean('oncenterslider')->default(true);
            /*отображать в стилях*/
            $table->boolean('onstyleslider')->default(true);
            $table->timestamps();
            //$table->foreignId('category_portfolio_id')->constrained();
            /*категории стилей проведения*/
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
