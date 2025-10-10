<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('challenge_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->string('attachment_01')->nullable();
            $table->string('attachment_02')->nullable();
            $table->string('attachment_03')->nullable();
            $table->text('hint');
            $table->string('source');
            $table->string('alternative_a')->nullable();
            $table->string('alternative_b')->nullable();
            $table->string('alternative_c')->nullable();
            $table->string('alternative_d')->nullable();
            $table->string('alternative_e')->nullable();
            $table->string('correct_alternative');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('challenge_questions');
    }
};
