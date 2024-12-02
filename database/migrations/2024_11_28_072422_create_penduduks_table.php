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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string("nama", 255); // Nama penduduk
            $table->string("nik", 16)->unique(); // NIK (maksimal 16 karakter, unik)
            $table->string("kecamatan", 255); // Nama kecamatan
            $table->string("kelurahan", 255); // Nama kelurahan
            $table->string("alamat", 255); // Kolom teks (alamat)
            $table->string("jenis_bantuan", 100); // Jenis bantuan
            $table->decimal("nominal", 15, 2); // Nominal bantuan
            $table->string("status_bantuan", 50); // Status bantuan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks'); // Menghapus tabel saat rollback
    }
};
