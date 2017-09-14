<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->string('order_number', 64);
            $table->string('customer_email');
            $table->string('payment_token');
            $table->string('client_ip', 25)->nullable();
            $table->string('cc_last_4', 25)->nullable();
            $table->string('cc_brand', 25)->nullable();
            $table->integer('total_paid')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
