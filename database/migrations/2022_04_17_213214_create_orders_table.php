<?php

use App\Enum\OrderEnum;
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
            $table->string('order')->nullable();
            $table->string('image')->nullable();

            $table->string('status')->default(OrderEnum::NEW_ORDER);

//            $table->unsignedBigInteger('invoice_id'); // TODO

            $table->boolean('periodic')->default(0); // TODO
            $table->date('re_order_date')->nullable(); // TODO

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('pharmacy_id');
            $table->foreign('pharmacy_id')->references('id')->on('users')->onDelete('cascade');

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
