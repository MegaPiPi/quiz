<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Wybierz quiz: wiedza ogólna albo samochody i F1')->name('home');
Route::get('/quiz/{slug}', fn (string $slug) => "Quiz: $slug")
    ->whereIn('slug', ['wiedza-ogolna', 'motoryzacja-f1'])
    ->name('quiz.show');