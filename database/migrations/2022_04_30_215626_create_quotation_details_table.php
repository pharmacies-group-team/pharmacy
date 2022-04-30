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
        Schema::create('quotation_details', function (Blueprint $table) {
          $table->id();
          $table->string('product_name');
          $table->string('product_unit');
          $table->string('quantity');
          $table->double('price');
          $table->double('total');
          $table->string('currency');

          $table->foreignId('quotation_id');
          $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');

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
        Schema::dropIfExists('quotation_details');
    }
};
