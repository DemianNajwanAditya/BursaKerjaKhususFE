<?php

// database/migrations/xxxx_xx_xx_create_job_posts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable(); // fulltime/parttime/intern
            $table->integer('vacancies')->nullable();
            $table->date('deadline')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}

