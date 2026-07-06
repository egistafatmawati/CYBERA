<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_question_id')->constrained('quiz_questions')->onDelete('cascade');
            $table->string('kode', 1); // A, B, C, D
            $table->string('teks_opsi');
            $table->timestamps();

            $table->unique(['quiz_question_id', 'kode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_question_options');
    }
};
