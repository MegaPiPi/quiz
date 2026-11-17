<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Format pytania: [treść, [odpowiedzi], numer poprawnej liczony od 0]
        $data = [
            [
                'quiz' => ['title' => 'Wiedza ogólna', 'slug' => 'wiedza-ogolna', 'description' => 'Sprawdź swoją wiedzę o świecie'],
                'questions' => [
                    ['Jaka jest stolica Australii?', ['Sydney', 'Canberra', 'Melbourne'], 1],
                    ['Ile jest kontynentów?', ['5', '6', '7'], 2],
                    ['Kto namalował Mona Lisę?', ['Leonardo da Vinci', 'Pablo Picasso', 'Vincent van Gogh'], 0],
                    ['Ile nóg ma pająk?', ['6', '8', '10'], 1],
                    ['Który ocean jest największy?', ['Atlantycki', 'Indyjski', 'Spokojny'], 2],
                    ['W którym roku Polska wstąpiła do Unii Europejskiej?', ['2000', '2004', '2007'], 1],
                    ['Jaki pierwiastek ma symbol O?', ['Złoto', 'Tlen', 'Osm'], 1],
                    ['Jaki jest najwyższy szczyt świata?', ['K2', 'Mont Blanc', 'Mount Everest'], 2],
                    ['Kto napisał „Pana Tadeusza”?', ['Juliusz Słowacki', 'Adam Mickiewicz', 'Henryk Sienkiewicz'], 1],
                    ['Ile stopni ma kąt prosty?', ['45', '90', '180'], 1],
                    ['Która planeta jest największa w Układzie Słonecznym?', ['Saturn', 'Jowisz', 'Neptun'], 1],
                    ['Jaka jest stolica Kanady?', ['Toronto', 'Vancouver', 'Ottawa'], 2],
                ],
            ],
            // Aby dodać pytanie: dopisz linijkę i uruchom php artisan migrate:fresh --seed
            [
                'quiz' => ['title' => 'Samochody i F1', 'slug' => 'motoryzacja-f1', 'description' => 'Dla fanów motoryzacji i Formuły 1'],
                'questions' => [
                    ['Z jakiego kraju pochodzi Ferrari?', ['Niemcy', 'Włochy', 'Francja'], 1],
                    ['Co oznacza skrót DRS w F1?', ['Drag Reduction System', 'Direct Racing Speed', 'Dynamic Road Stability'], 0],
                    ['Ile tytułów mistrza świata F1 zdobył Lewis Hamilton?', ['5', '6', '7'], 2],
                    ['Jaki kolor dominuje w barwach zespołu Williams?', ['Czerwony', 'Niebieski', 'Zielony'], 1],
                    ['Który supercar jest „rodzinny” i ma 4 miejsca?', ['Bugatti Chiron', 'Koenigsegg Gemera', 'Pagani Zonda'], 1],
                    ['Jak nazywa się pies Charlesa Leclerca?', ['Max', 'Rocky', 'Leo'], 2],
                    ['Ile punktów dostaje zwycięzca wyścigu F1?', ['10', '25', '30'], 1],
                    ['Który Polak startował w Formule 1?', ['Robert Kubica', 'Kamil Stoch', 'Robert Lewandowski'], 0],
                    ['Co oznacza czerwona flaga w F1?', ['Ostatnie okrążenie', 'Przerwanie sesji', 'Koniec wyścigu dla lidera'], 1],
                    ['Na jakim torze odbywa się Grand Prix Włoch?', ['Monza', 'Silverstone', 'Spa'], 0],
                    ['Który zespół F1 ma w logo czerwone byki?', ['McLaren', 'Mercedes', 'Red Bull'], 2],
                    ['Która marka produkuje model Mustang?', ['Chevrolet', 'Ford', 'Dodge'], 1],
                ],
            ],
        ];

        // Zapis do bazy: quiz, potem jego pytania, potem odpowiedzi do każdego pytania
        foreach ($data as $item) {
            $quiz = Quiz::create($item['quiz']);

            foreach ($item['questions'] as [$content, $answers, $correct]) {
                $question = $quiz->questions()->create(['content' => $content]);

                foreach ($answers as $index => $text) {
                    $question->answers()->create(['content' => $text, 'is_correct' => $index === $correct]);
                }
            }
        }
    }
}
