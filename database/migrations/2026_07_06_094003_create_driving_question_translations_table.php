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
        Schema::create('driving_question_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driving_question_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->text('question');
            $table->longText('explanation')->nullable();
            $table->timestamps();

            $table->unique(['driving_question_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_question_translations');
    }
};
