<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('reason')->nullable();
            $table->string('format')->nullable();
            $table->integer('guest_count')->nullable()->default(1);
            $table->string('status');
            $table->date('event_date');
            $table->string('city');
            $table->string('street');
            $table->string('building');
            $table->string('payment_type');
            $table->timestamps();

            $table->index(['id', 'status', 'event_date']);
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->integer('count');
            $table->primary(['product_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
        Schema::dropIfExists('orders');
    }
}
