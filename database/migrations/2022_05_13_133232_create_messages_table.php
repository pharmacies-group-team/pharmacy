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
    Schema::create('messages', function (Blueprint $table) {
      $table->bigIncrements('id');


      $table->foreignId('from');
      $table->foreign('from')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');


      $table->foreignId('to');
      $table->foreign('to')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');


      $table->text('message');
      $table->tinyInteger('is_read')->default(0);
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
    Schema::dropIfExists('messages');
  }
};
