<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alternatif');
            $table->decimal('kriteria_1', 15, 2); // max value 999,999,999.99
            $table->integer('kriteria_2'); // mapped to 0, 1, 2, 3
            $table->integer('kriteria_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};
