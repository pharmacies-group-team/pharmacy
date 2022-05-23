<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('perodic_orders', function (Blueprint $table) {
        $table->id();

        $table->date('next_order_date')->nullable();
        $table->date('start_date');
        $table->string('perodic_date_type');
        $table->boolean('is_active');

        $table->foreignId('order_id');
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

        $table->foreignId('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        $table->softDeletes();
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
        Schema::dropIfExists('perodic_orders');
    }
};
