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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->default(0);
            $table->string('currency')->default('YER');

            $table->foreignId('order_id')->unique();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->foreignId('address_id')->unique();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

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
        Schema::dropIfExists('quotations');
    }
};
