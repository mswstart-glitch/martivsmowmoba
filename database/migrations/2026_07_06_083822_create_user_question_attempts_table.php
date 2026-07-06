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
        Schema::create('user_question_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('question_id');
            $table->unsignedInteger('ticket_number')->nullable();
            $table->string('topic')->nullable();
            $table->string('selected_answer');
            $table->string('correct_answer');
            $table->boolean('is_correct');
            $table->string('mode')->default('practice');
            $table->unsignedInteger('time_spent_seconds')->nullable();
            $table->timestamps();

            $table->index('question_id');
            $table->index('topic');
            $table->index('is_correct');
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_question_attempts');
    }
};
