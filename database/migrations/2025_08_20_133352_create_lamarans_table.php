<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelamar'); // langsung pakai nama, bukan user_id
            $table->unsignedBigInteger('lowongan_id'); // relasi ke lowongan
            $table->string('cv')->nullable();
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak'])->default('Menunggu');
            $table->timestamps();

            // Relasi ke tabel lowongans
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
