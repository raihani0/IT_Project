<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 255);
            $table->string("nik", 16)->unique();
            $table->string("desa", 255);
            $table->string("alamat", 255);
            $table->string("jenis_bantuan", 100);
            $table->decimal("nominal", 15, 2)->default(0);
            $table->boolean("status_bantuan")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
