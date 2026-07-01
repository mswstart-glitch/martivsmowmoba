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
}
