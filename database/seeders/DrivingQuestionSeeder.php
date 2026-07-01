<?php

namespace Database\Seeders;

use App\Models\DrivingAnswer;
use App\Models\DrivingQuestion;
use Illuminate\Database\Seeder;

class DrivingQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('../autoschool-test/output/sample_questions.json');

        $items = json_decode(file_get_contents($path), true);

        foreach (array_slice($items, 0, 5) as $item) {
            $question = DrivingQuestion::create([
                'ticket_no' => $item['ticket_no'] ?? null,
                'question' => $item['question'] ?? '',
                'image' => $item['image'] ?? null,
                'explanation' => $item['explanation'] ?? null,
            ]);

            foreach (($item['answers'] ?? []) as $answer) {
                $text = is_array($answer) ? ($answer['text'] ?? '') : $answer;

                DrivingAnswer::create([
                    'driving_question_id' => $question->id,
                    'answer' => $text,
                    'is_correct' => $text === ($item['correct_answer'] ?? ''),
                ]);
            }
        }
    }
}
