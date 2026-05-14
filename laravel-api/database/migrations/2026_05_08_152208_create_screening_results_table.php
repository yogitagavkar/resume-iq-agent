<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screening_results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resume_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('match_score');

            $table->json('skills_found');
            $table->json('matched_skills');
            $table->json('missing_skills');

            $table->string('recommendation');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screening_results');
    }
};