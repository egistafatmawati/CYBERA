<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = ['materi_id', 'judul', 'deskripsi', 'tips'];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class)->orderBy('urutan');
    }

    public function results(): HasMany
    {
        return $this->hasMany(QuizResult::class);
    }
}
