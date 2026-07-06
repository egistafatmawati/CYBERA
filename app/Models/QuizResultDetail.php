<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizResultDetail extends Model
{
    protected $fillable = [
        'quiz_result_id',
        'quiz_question_id',
        'jawaban_user',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function quizResult(): BelongsTo
    {
        return $this->belongsTo(QuizResult::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id');
    }
}
