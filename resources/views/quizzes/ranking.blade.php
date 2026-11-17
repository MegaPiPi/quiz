@extends('layouts.app')

@section('content')
    @if (session('message'))
        <p class="message">{{ session('message') }}</p>
    @endif

    <h1>Ranking</h1>
    @foreach ($quizzes as $quiz)
        <div class="card">
            <h2>{{ $quiz->title }}</h2>
            <table>
                @forelse ($quiz->results as $result)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $result->nick }}</td>
                        <td>{{ $result->score }} / {{ $result->total }}</td>
                    </tr>
                @empty
                    <tr><td>Nikt jeszcze nie zagrał.</td></tr>
                @endforelse
            </table>
        </div>
    @endforeach
@endsection
