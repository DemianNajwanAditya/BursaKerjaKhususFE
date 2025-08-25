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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');              // Judul Lowongan
            $table->text('deskripsi')->nullable(); // Deskripsi pekerjaan
            $table->string('lokasi')->nullable();  // Lokasi kerja
            $table->decimal('gaji', 15, 2)->nullable(); // Gaji (opsional)
            $table->string('status')->default('aktif'); // aktif / non-aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
