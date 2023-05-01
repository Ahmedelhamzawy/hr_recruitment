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
        Schema::create('applicantjobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreignId('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->string('latest_company');
            $table->string('latest_title');
            $table->string('work_field');
            $table->integer('experience');
            $table->string('education_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicantjobs');
    }
};
