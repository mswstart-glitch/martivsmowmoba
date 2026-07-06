<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserQuestionAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'ticket_number',
        'topic',
        'selected_answer',
        'correct_answer',
        'is_correct',
        'mode',
        'time_spent_seconds',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(DrivingQuestion::class, 'question_id');
    }
}
