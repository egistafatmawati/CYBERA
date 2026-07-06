<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skenario extends Model
{
    protected $fillable = [
        'simulasi_id',
        'urutan',
        'skenario',
        'pertanyaan',
        'jenis_jawaban',
        'jawaban_benar',
        'penjelasan',
    ];

    public function simulasi(): BelongsTo
    {
        return $this->belongsTo(Simulasi::class);
    }

    public function opsis(): HasMany
    {
        return $this->hasMany(SkenarioOpsi::class)->orderBy('kode');
    }
}
