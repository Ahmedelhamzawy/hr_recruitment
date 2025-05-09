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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('job_title');
            $table->string('job_field');
            $table->integer('experience');
            $table->longText('job_description');
            $table->timestamps();
            $table->foreignId('recruiter_id')->references('id')->on('recruiters') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');

    }
};
