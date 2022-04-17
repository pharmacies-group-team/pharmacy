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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('periodic')->default(0);
            $table->date('re_order_date')->nullable();

            $table->foreignId('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->foreignId('pharmacy_id');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
};
