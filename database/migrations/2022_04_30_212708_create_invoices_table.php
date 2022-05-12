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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->string('currency')->default('YER');
            $table->boolean('is_active')->default(0);

            $table->string('invoice_id');

            $table->foreignId('order_id')->unique();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->foreignId('payment_user_id')->nullable();
            $table->foreign('payment_user_id')->references('id')->on('payment_users')->onDelete('cascade');

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
        Schema::dropIfExists('invoices');
    }
};
