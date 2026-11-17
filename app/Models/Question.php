<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Pytanie należy do quizu i ma kilka odpowiedzi
class Question extends Model
{
    protected $fillable = ['content'];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
