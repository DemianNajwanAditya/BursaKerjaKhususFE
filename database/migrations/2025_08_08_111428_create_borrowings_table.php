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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // peminjam
            $table->foreignId('commodity_id')->constrained('commodities')->onDelete('cascade'); // barang
            $table->integer('quantity')->default(1);
            $table->date('borrow_date');
            $table->date('expected_return_date'); // seharusnya kembali
            $table->date('return_date')->nullable(); // tanggal kembali
            $table->string('status')->default('pending'); // pending, approved, returned, late
            $table->integer('late_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
