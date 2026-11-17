<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Jeden wpis w rankingu: kto, ile punktów, na ile możliwych
class Result extends Model
{
    protected $fillable = ['nick', 'score', 'total'];
}
