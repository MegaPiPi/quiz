<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Quizy</a>
        <a href="{{ route('ranking') }}">Ranking</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
