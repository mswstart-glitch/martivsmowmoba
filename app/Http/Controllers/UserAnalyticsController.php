<?php

namespace App\Http\Controllers;

use App\Models\DrivingQuestion;
use App\Models\UserQuestionAttempt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class UserAnalyticsController extends Controller
{
    /**
     * Store a single answered-question attempt for the authenticated user.
     */
    public function saveAttempt(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'question_id' => ['required', 'integer', 'exists:driving_questions,id'],
            'answer_id' => ['required', 'integer'],
            'mode' => ['required', 'string', 'in:exam,test,practice'],
            'time_spent_seconds' => ['nullable', 'integer', 'min:0', 'max:3600'],
        ]);

        $question = DrivingQuestion::with('answers')->findOrFail($validated['question_id']);

        $selectedAnswer = $question->answers->firstWhere('id', $validated['answer_id']);

        if (!$selectedAnswer) {
            return response()->json(['message' => __('messages.exam_demo.answer_mismatch')], 422);
        }

        $correctAnswer = $question->answers->firstWhere('is_correct', true);

        $attempt = UserQuestionAttempt::create([
            'user_id' => $request->user()->id,
            'question_id' => $question->id,
            'ticket_number' => $question->ticket_no ?? null,
            'topic' => $question->topic ?? null,
            'selected_answer' => $selectedAnswer->answer,
            'correct_answer' => $correctAnswer->answer ?? '',
            'is_correct' => (bool) $selectedAnswer->is_correct,
            'mode' => $validated['mode'],
            'time_spent_seconds' => $validated['time_spent_seconds'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'is_correct' => $attempt->is_correct,
        ], 201);
    }

    /**
     * Show the authenticated user's exam analytics dashboard.
     */
    public function analytics(Request $request): View
    {
        $userId = $request->user()->id;

        $base = UserQuestionAttempt::where('user_id', $userId);

        $total = (clone $base)->count();
        $correct = (clone $base)->where('is_correct', true)->count();
        $wrong = $total - $correct;
        $successRate = $total > 0 ? round($correct / $total * 100, 1) : 0;

        $weakTopics = (clone $base)
            ->whereNotNull('topic')
            ->where('is_correct', false)
            ->selectRaw('topic, count(*) as mistakes')
            ->groupBy('topic')
            ->orderByDesc('mistakes')
            ->take(5)
            ->get();

        $weakQuestions = (clone $base)
            ->where('is_correct', false)
            ->selectRaw('question_id, ticket_number, count(*) as mistakes')
            ->groupBy('question_id', 'ticket_number')
            ->orderByDesc('mistakes')
            ->take(5)
            ->with('question:id,question,ticket_no')
            ->get();

        $recentActivity = (clone $base)
            ->latest()
            ->take(10)
            ->with('question:id,question,ticket_no')
            ->get();

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $weekAgo = Carbon::today()->subDays(6);

        $dailyProgress = [
            'today' => $this->rangeStats($base, $today, Carbon::tomorrow()),
            'yesterday' => $this->rangeStats($base, $yesterday, $today),
            'last_7_days' => $this->rangeStats($base, $weekAgo, Carbon::tomorrow()),
        ];

        $recommendations = $this->buildRecommendations($weakTopics, $weakQuestions, $successRate, $total);

        return view('profile.analytics', [
            'total' => $total,
            'correct' => $correct,
            'wrong' => $wrong,
            'successRate' => $successRate,
            'weakTopics' => $weakTopics,
            'weakQuestions' => $weakQuestions,
            'recentActivity' => $recentActivity,
            'dailyProgress' => $dailyProgress,
            'recommendations' => $recommendations,
        ]);
    }

    /**
     * Aggregate attempt counts/percentages for a [start, end) date range.
     */
    private function rangeStats($base, Carbon $start, Carbon $end): array
    {
        $attempts = (clone $base)->whereBetween('created_at', [$start, $end])->count();
        $rangeCorrect = (clone $base)->whereBetween('created_at', [$start, $end])->where('is_correct', true)->count();

        return [
            'attempts' => $attempts,
            'correct_percent' => $attempts > 0 ? round($rangeCorrect / $attempts * 100, 1) : 0,
            'wrong_percent' => $attempts > 0 ? round(($attempts - $rangeCorrect) / $attempts * 100, 1) : 0,
        ];
    }

    /**
     * Turn weak spots into short, actionable Georgian recommendations.
     */
    private function buildRecommendations($weakTopics, $weakQuestions, float $successRate, int $total): array
    {
        if ($total === 0) {
            return [__('messages.analytics.rec_no_data')];
        }

        $recommendations = [];

        foreach ($weakTopics->take(3) as $topic) {
            $recommendations[] = __('messages.analytics.rec_practice_topic', ['topic' => $topic->topic]);
        }

        foreach ($weakQuestions->take(3) as $weak) {
            if ($weak->ticket_number) {
                $recommendations[] = __('messages.analytics.rec_retake_ticket', ['ticket' => $weak->ticket_number]);
            }
        }

        if ($successRate < 60) {
            $recommendations[] = __('messages.analytics.rec_low_success');
        }

        if (empty($recommendations)) {
            $recommendations[] = __('messages.analytics.rec_good');
        }

        return $recommendations;
    }
}
