<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    protected $fillable = [
        'code',
        'question_ids',
        'creator_session_id',
    ];

    protected $casts = [
        'question_ids' => 'array',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(ChallengeResult::class);
    }
}
