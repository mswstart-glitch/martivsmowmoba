<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('driving_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ticket_no')->nullable()->index();
            $table->text('question');
            $table->string('image')->nullable();
            $table->text('explanation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driving_questions');
    }
};
