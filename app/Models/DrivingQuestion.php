<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DrivingQuestion extends Model
{
    protected $fillable = [
        'ticket_no',
        'question',
        'image',
        'explanation',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(DrivingAnswer::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(DrivingQuestionTranslation::class);
    }

    /**
     * The question text in the current (or given) locale, falling back to Georgian.
     */
    public function translatedText(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        if ($locale === 'ka') {
            return $this->question;
        }

        return $this->translations->firstWhere('locale', $locale)->question
            ?? $this->question;
    }

    /**
     * The explanation text in the current (or given) locale, falling back to Georgian.
     */
    public function translatedExplanation(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        if ($locale === 'ka') {
            return (string) $this->explanation;
        }

        return $this->translations->firstWhere('locale', $locale)->explanation
            ?? (string) $this->explanation;
    }
}
