<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DrivingAnswer extends Model
{
    protected $fillable = [
        'driving_question_id',
        'answer',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(DrivingQuestion::class, 'driving_question_id');
    }

    public function translations(): HasMany
    {
        return $this->hasMany(DrivingAnswerTranslation::class);
    }

    /**
     * The answer text in the current (or given) locale, falling back to Georgian.
     */
    public function translatedText(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        if ($locale === 'ka') {
            return $this->answer;
        }

        return $this->translations->firstWhere('locale', $locale)->answer
            ?? $this->answer;
    }
}
