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
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('job_post_id')->nullable()->after('user_id');
            $table->string('status')->default('pending')->after('cv_path'); // pending/accepted/rejected
            $table->text('cover_letter')->nullable()->after('status');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // job_posts must exist first
            $table->foreign('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['job_post_id']);
            $table->dropColumn(['user_id', 'job_post_id', 'status', 'cover_letter']);
        });
    }
};
