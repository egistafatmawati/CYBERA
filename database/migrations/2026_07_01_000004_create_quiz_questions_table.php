<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->unsignedInteger('urutan');
            $table->text('pertanyaan');
            $table->string('jenis_jawaban'); // 'pilihan_ganda' | 'ya_tidak'
            $table->string('jawaban_benar');
            $table->timestamps();

            $table->unique(['quiz_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
