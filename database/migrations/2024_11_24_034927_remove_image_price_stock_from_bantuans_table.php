<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImagePriceStockFromBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bantuans', function (Blueprint $table) {
            $table->dropColumn(['image', 'price', 'stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bantuans', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('stock')->nullable();
        });
    }
}
