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
    Schema::create('jadwal_kegiatans', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->enum('kategori', ['siraman', 'cek_kebersihan', 'buang_sampah']);
        $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
        $table->string('lokasi')->nullable();
        $table->text('link_drive')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kegiatan');
    }
};
