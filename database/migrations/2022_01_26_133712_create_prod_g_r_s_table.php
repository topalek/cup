<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdGRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_g_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->integer('price_per_unit')->nullable();
            $table->integer('price_full')->nullable();
            $table->mediumText('composition')->nullable(); // состав
            $table->float('weight_per_unit')->nullable();
            $table->integer('countpr')->nullable();
            // БЖУ и вес
            $table->float('weight_full')->nullable();
            $table->integer('protein')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbohydrates')->nullable();
            # TODO: Тултипы мне неизвестны, поэтому здесь просто булеан
            $table->boolean('tooltip1')->nullable()->default(true);
            $table->boolean('tooltip2')->nullable()->default(true);
            $table->boolean('tooltip3')->nullable()->default(true);
            $table->boolean('tooltip4')->nullable()->default(true);
            # END OF TOOLTIPS
            $table->boolean('active')->default(true);
            $table->boolean('popular')->default(true);
            $table->foreignId('category_g_r_s_id')->constrained();
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
        Schema::dropIfExists('prod_g_r_s');
    }
}
