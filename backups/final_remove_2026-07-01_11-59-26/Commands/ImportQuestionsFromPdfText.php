<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportQuestionsFromPdfText extends Command
{
    protected $signature = 'questions:import {--fresh : Delete existing questions before import}';
    protected $description = 'Import Georgian driving exam questions from parsed PDF text';

    public function handle(): int
    {
        $path = storage_path('app/imports/ge_all_raw.txt');

        if (! file_exists($path)) {
            $this->error("Text file not found: {$path}");
            return self::FAILURE;
        }

        $raw = file_get_contents($path);

        preg_match_all(
            '/ბილეთი:\s*(\d+)\s+სწორი პასუხი:\s*(\d+)(.*?)(?=\n\s*ბილეთი:\s*\d+\s+სწორი პასუხი:|\z)/su',
            $raw,
            $matches,
            PREG_SET_ORDER
        );

        if ($this->option('fresh')) {
            DB::table('question_answers')->delete();
            DB::table('questions')->delete();
        }

        $created = 0;
        $skipped = 0;

        foreach ($matches as $match) {
            $ticketNumber = (int) $match[1];
            $correctAnswer = (int) $match[2];
            $body = trim($match[3]);

            [$main, $explanation] = str_contains($body, 'განმარტება:')
                ? explode('განმარტება:', $body, 2)
                : [$body, null];

            $main = trim($main);
            $explanation = $explanation ? trim(preg_replace('/\s+/u', ' ', $explanation)) : null;

            $lines = collect(preg_split('/\R/u', $main))
                ->map(fn ($line) => trim($line))
                ->filter()
                ->values();

            $questionLines = [];
            $answerBlob = '';

            foreach ($lines as $line) {
                if (preg_match('/^\d+\s+/u', $line)) {
                    $answerBlob .= ' ' . $line;
                } else {
                    $questionLines[] = $line;
                }
            }

            $questionText = trim(preg_replace('/\s+/u', ' ', implode(' ', $questionLines)));

            preg_match_all('/(?:^|\s)([1-9])\s+(.+?)(?=\s+[1-9]\s+|$)/su', $answerBlob, $answerMatches, PREG_SET_ORDER);

            $answers = [];
            foreach ($answerMatches as $answerMatch) {
                $answers[] = [
                    'option_number' => (int) $answerMatch[1],
                    'answer' => trim(preg_replace('/\s+/u', ' ', $answerMatch[2])),
                ];
            }

            if (! $questionText || count($answers) < 2) {
                $skipped++;
                continue;
            }

            $question = Question::updateOrCreate(
                ['ticket_number' => $ticketNumber],
                [
                    'question' => $questionText,
                    'correct_answer' => $correctAnswer,
                    'explanation' => $explanation,
                    'image_path' => null,
                ]
            );

            $question->answers()->delete();
            $question->answers()->createMany($answers);

            $created++;
        }

        $this->info("Imported/updated: {$created}");
        $this->warn("Skipped: {$skipped}");
        $this->info('Done.');

        return self::SUCCESS;
    }
}
