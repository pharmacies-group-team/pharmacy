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
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('drug_name');
            $table->dropColumn('drug_image');
            $table->dropColumn('type');
            $table->dropColumn('quantity');
            $table->dropColumn('details');

            $table->string('order')->nullable()->after('id');
            $table->string('image')->nullable()->after('order');

            $table->foreignId('order_id')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
};
