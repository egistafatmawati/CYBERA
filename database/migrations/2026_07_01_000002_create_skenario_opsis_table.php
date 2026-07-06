<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skenario_opsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skenario_id')->constrained('skenarios')->onDelete('cascade');
            $table->string('kode', 1); // A, B, C, D
            $table->string('teks_opsi');
            $table->timestamps();

            $table->unique(['skenario_id', 'kode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skenario_opsis');
    }
};
