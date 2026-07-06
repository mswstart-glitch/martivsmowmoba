<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrivingQuestionTranslation extends Model
{
    protected $fillable = [
        'driving_question_id',
        'locale',
        'question',
        'explanation',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(DrivingQuestion::class, 'driving_question_id');
    }
}
