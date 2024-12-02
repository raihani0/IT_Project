<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');  // ID pengguna
            $table->string('name');                 // Nama pengguna
            $table->string('status');               // Status aksi
            $table->timestamp('timestamp');         // Waktu aksi
            $table->string('role')->nullable();     // Peran pengguna
            $table->timestamps();

            // Menghubungkan dengan tabel users
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
}
