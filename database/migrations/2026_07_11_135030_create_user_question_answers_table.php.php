<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->string('selected_option', 10);
            $table->boolean('is_correct');
            $table->unsignedInteger('response_time_seconds')->default(0);
            $table->unsignedInteger('xp_earned')->default(0);
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['user_id', 'is_correct']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_question_answers');
    }
};
