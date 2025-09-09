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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->string('content');
            $table->string('source');
            $table->text('tip');
            $table->string('tip_attachment')->nullable();
            $table->text('statement');
            $table->string('statement_attachment1')->nullable();
            $table->string('statement_attachment2')->nullable();
            $table->string('statement_attachment3')->nullable();
            $table->string('correct_option');
            $table->string('option_a');
            $table->string('option_a_attachment')->nullable();
            $table->string('option_b');
            $table->string('option_b_attachment')->nullable();
            $table->string('option_c');
            $table->string('option_c_attachment')->nullable();
            $table->string('option_d');
            $table->string('option_d_attachment')->nullable();
            $table->string('option_e');
            $table->string('option_e_attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
