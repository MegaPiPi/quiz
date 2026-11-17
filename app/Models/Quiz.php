<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    // Wyniki od najlepszego; przy remisie wyżej jest ten, kto zagrał wcześniej
    public function results(): HasMany
    {
        return $this->hasMany(Result::class)->orderByDesc('score')->orderBy('created_at');
    }
}
