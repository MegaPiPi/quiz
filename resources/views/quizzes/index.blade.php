@extends('layouts.app')

@section('content')
    <h1>Wybierz quiz</h1>
    {{-- Jedna karta dla każdego quizu z bazy --}}
    @foreach ($quizzes as $quiz)
        <a class="card" href="{{ route('quiz.show', $quiz) }}">
            <h2>{{ $quiz->title }}</h2>
            <p>{{ $quiz->description }}</p>
        </a>
    @endforeach
@endsection
