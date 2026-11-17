@extends('layouts.app')

@section('content')
    <h1>{{ $quiz->title }}</h1>

    <form method="POST" action="{{ route('quiz.submit', $quiz) }}">
        @csrf
        <label>Twój nick: <input name="nick" value="{{ old('nick') }}"></label>
        @error('nick') <p class="error">{{ $message }}</p> @enderror

        @foreach ($quiz->questions as $question)
            <div class="card">
                <h2>{{ $loop->iteration }}. {{ $question->content }}</h2>
                @foreach ($question->answers as $answer)
                    <label class="answer">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}"
                            @checked(old("answers.$question->id") == $answer->id)>
                        {{ $answer->content }}
                    </label>
                @endforeach
            </div>
        @endforeach

        @error('answers') <p class="error">{{ $message }}</p> @enderror
        <button type="submit">Sprawdź wynik</button>
    </form>
@endsection
