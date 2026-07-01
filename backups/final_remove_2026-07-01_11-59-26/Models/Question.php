<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'ticket_number',
        'question',
        'correct_answer',
        'explanation',
        'image_path',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class);
    }
}
