<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'student_name',
        'photo',
        'rating',
        'review_text',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'rating' => 'integer',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
