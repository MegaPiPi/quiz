<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuizController::class, 'index'])->name('home');
Route::get('/ranking', [QuizController::class, 'ranking'])->name('ranking');

Route::middleware('log.quiz')->group(function () {
    Route::get('/quiz/{quiz:slug}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz:slug}', [QuizController::class, 'submit'])->name('quiz.submit');
});
