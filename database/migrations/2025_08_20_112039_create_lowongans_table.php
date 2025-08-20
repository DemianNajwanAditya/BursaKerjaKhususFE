<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');                   // Judul lowongan
            $table->text('deskripsi');                 // Deskripsi pekerjaan
            $table->string('perusahaan');              // Nama perusahaan
            $table->string('lokasi');                  // Lokasi kerja
            $table->date('batas_lamaran')->nullable(); // Deadline lamaran
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
