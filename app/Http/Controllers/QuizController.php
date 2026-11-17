<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quizzes.index', ['quizzes' => Quiz::all()]);
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', ['quiz' => $quiz->load('questions.answers')]);
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $questions = $quiz->questions()->with('answers')->get();

        $data = $request->validate([
            'nick' => 'required|string|min:2|max:30',
            'answers' => 'required|array|size:' . $questions->count(),
        ], [
            'nick.required' => 'Podaj swój nick.',
            'nick.min' => 'Nick musi mieć co najmniej 2 znaki.',
            'answers.required' => 'Odpowiedz na wszystkie pytania.',
            'answers.size' => 'Odpowiedz na wszystkie pytania.',
        ]);

        $score = $questions
            ->filter(fn ($question) => $question->answers->find($data['answers'][$question->id] ?? null)?->is_correct)
            ->count();

        $quiz->results()->create(['nick' => $data['nick'], 'score' => $score, 'total' => $questions->count()]);

        return redirect()->route('ranking')
            ->with('message', "{$data['nick']}, Twój wynik w quizie „{$quiz->title}”: $score / {$questions->count()}");
    }

    public function ranking()
    {
        return view('quizzes.ranking', [
            'quizzes' => Quiz::with(['results' => fn ($query) => $query->limit(10)])->get(),
        ]);
    }
}
