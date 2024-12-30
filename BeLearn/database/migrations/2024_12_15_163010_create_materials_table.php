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
        Schema::create('materials', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->integer('kelas'); // Kolom untuk menyimpan kelas
            $table->string('mata_pelajaran'); // Kolom untuk mata pelajaran
            $table->integer('bab'); // Kolom untuk nama bab
            $table->string('nama_video')->nullable(); // Kolom untuk nama video, 
            $table->string('video_url')->nullable(); // Kolom untuk link video, 
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
