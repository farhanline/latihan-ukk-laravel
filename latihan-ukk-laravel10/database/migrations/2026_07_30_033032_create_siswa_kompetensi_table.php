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
        Schema::create('siswa_kompetensi', function (Blueprint $table) {
 $table->id();
 $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
 $table->foreignId('kompetensi_id')->constrained('kompetensis')->onDelete('cascade');
 $table->string('nilai', 5)->nullable(); // contoh: 'B', 'SB', atau angka 0-
 $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_kompetensi');
    }
};
