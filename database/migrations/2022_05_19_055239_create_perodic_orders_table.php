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
      $table->foreignId('order_id');
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
      $table->date('next_order');
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