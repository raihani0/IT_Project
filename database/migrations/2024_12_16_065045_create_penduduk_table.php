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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->unsignedBigInteger('desa_id');
            $table->text('alamat');
            $table->string('jenis_bantuan');
            $table->decimal('nominal', 15, 2);
            $table->enum('status_bantuan', allowed: ['Sudah Menerima', 'Belum Menerima']);
            $table->timestamps();

            $table->foreign("desa_id")->references('id')->on('desa')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
