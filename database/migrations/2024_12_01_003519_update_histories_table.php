<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            // Tambahkan perubahan pada tabel di sini
            $table->string('new_column')->nullable(); // Contoh perubahan
        });
    }

    public function down(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropColumn('new_column'); // Hapus kolom saat rollback
        });
    }
};
