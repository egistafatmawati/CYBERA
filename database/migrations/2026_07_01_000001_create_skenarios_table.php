<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skenarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulasi_id')->constrained('simulasis')->onDelete('cascade');
            $table->unsignedTinyInteger('urutan'); // 1, 2, 3
            $table->text('skenario');
            $table->text('pertanyaan');
            $table->string('jenis_jawaban'); // 'pilihan_ganda' | 'ya_tidak'
            $table->string('jawaban_benar'); // ya_tidak: 'ya'/'tidak', pilihan_ganda: kode opsi mis. 'A'
            $table->text('penjelasan');
            $table->timestamps();

            $table->unique(['simulasi_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skenarios');
    }
};
