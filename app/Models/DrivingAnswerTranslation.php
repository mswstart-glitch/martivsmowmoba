<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrivingAnswerTranslation extends Model
{
    protected $fillable = [
        'driving_answer_id',
        'locale',
        'answer',
    ];

    public function answer(): BelongsTo
    {
        return $this->belongsTo(DrivingAnswer::class, 'driving_answer_id');
    }
}
