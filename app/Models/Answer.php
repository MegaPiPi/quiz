<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Odpowiedź do pytania; is_correct = 1 oznacza poprawną
class Answer extends Model
{
    protected $fillable = ['content', 'is_correct'];
}
