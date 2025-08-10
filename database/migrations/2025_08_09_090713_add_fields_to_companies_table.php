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
    Schema::table('companies', function (Blueprint $table) {
        if (!Schema::hasColumn('companies', 'logo')) {
            $table->string('logo')->nullable();
        }
        if (!Schema::hasColumn('companies', 'website')) {
            $table->string('website')->nullable();
        }
        if (!Schema::hasColumn('companies', 'description')) {
            $table->text('description')->nullable();
        }
        if (!Schema::hasColumn('companies', 'status')) {
            $table->enum('status', ['pending', 'verified'])->default('pending');
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
};
