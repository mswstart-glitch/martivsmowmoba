<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeResult;
use App\Models\DrivingQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    /**
     * How many questions a challenge tries to pull, matching the real
     * exam ticket (esvinkofila/test.html): 30 questions, fail if 5+ wrong.
     */
    private const QUESTIONS_PER_CHALLENGE = 30;

    /**
     * Real exam pass rule (esvinkofila/test.html: `wrong < 5`), expressed
     * as "at most this many wrong answers to still pass".
     */
    private const PASS_MAX_WRONG = 4;

    /**
     * Codes only use unambiguous uppercase letters/digits (no 0/O/1/I).
     */
    private const CODE_ALPHABET = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    /**
     * Create a new challenge with a fixed, shared set of questions and
     * redirect the creator straight into it. Questions are drawn from the
     * same bank the real exam (esvinkofila/test.html) uses, so challenge
     * mode can open that exact exam with a fixed question set.
     */
    public function create(Request $request): RedirectResponse
    {
        $ids = $this->allRealExamQuestionIds();
        $count = min(self::QUESTIONS_PER_CHALLENGE, count($ids));

        abort_if($count === 0, 503, __('messages.challenge.not_found'));

        $questionIds = collect($ids)->shuffle()->take($count)->values()->all();

        $challenge = Challenge::create([
            'code' => $this->generateUniqueCode(),
            'question_ids' => $questionIds,
            'creator_session_id' => $request->session()->getId(),
        ]);

        return redirect()->route('challenge.show', $challenge->code);
    }

    /**
     * All question ids available in the real exam's question bank
     * (public/esvinkofila/data/questions.json — a static file maintained
     * by a separate project; read-only, never written to from here).
     */
    private function allRealExamQuestionIds(): array
    {
        $path = public_path('esvinkofila/data/questions.json');

        if (!is_file($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true) ?: [];

        return array_values(array_filter(array_column($data, 'id')));
    }

    /**
     * Invite / landing screen: "a friend challenged you", with the code and
     * a link to actually start the shared exam. Never renders the exam itself.
     */
    public function show(Request $request, string $code): View
    {
        $challenge = Challenge::where('code', $code)->first();

        abort_if(!$challenge, 404, __('messages.challenge.not_found'));

        return view('challenge.show', [
            'challenge' => $challenge,
        ]);
    }

    /**
     * Open the real exam (esvinkofila/test.html's engine, reused in place —
     * see resources/views/challenge/exam.blade.php) in challenge mode, using
     * the challenge's fixed question set so every participant sees the same
     * 30 questions in the same order.
     */
    public function start(Request $request, string $code): View
    {
        $challenge = Challenge::with('results')->where('code', $code)->first();

        abort_if(!$challenge, 404, __('messages.challenge.not_found'));

        $sessionId = $request->session()->getId();

        return view('challenge.exam', [
            'challenge' => $challenge,
            'challengeStatus' => $this->buildStatusPayload($challenge, $sessionId),
        ]);
    }

    /**
     * Store (or update) this participant's result for the challenge and
     * return the current comparison state.
     */
    public function storeResult(Request $request, string $code): JsonResponse
    {
        $challenge = Challenge::where('code', $code)->first();

        abort_if(!$challenge, 404, __('messages.challenge.not_found'));

        $validated = $request->validate([
            'correct_count' => ['required', 'integer', 'min:0'],
            'total_questions' => ['required', 'integer', 'min:1'],
            'time_seconds' => ['required', 'integer', 'min:0'],
        ]);

        $sessionId = $request->session()->getId();

        $challenge->results()->updateOrCreate(
            ['participant_session_id' => $sessionId],
            [
                'user_id' => $request->user()?->id,
                'correct_count' => min($validated['correct_count'], $validated['total_questions']),
                'total_questions' => $validated['total_questions'],
                'time_seconds' => $validated['time_seconds'],
                'completed_at' => now(),
            ]
        );

        $challenge->load('results');

        return response()->json($this->buildStatusPayload($challenge, $sessionId));
    }

    /**
     * Leaderboard screen: JSON status for the in-exam poller, or the standalone
     * results/comparison page (single result waiting, or full ranked list).
     */
    public function results(Request $request, string $code): View|JsonResponse
    {
        $challenge = Challenge::with('results')->where('code', $code)->first();

        abort_if(!$challenge, 404, __('messages.challenge.not_found'));

        $sessionId = $request->session()->getId();

        if ($request->wantsJson()) {
            return response()->json($this->buildStatusPayload($challenge, $sessionId));
        }

        $leaderboard = $challenge->results
            ->sortBy([
                fn (ChallengeResult $a, ChallengeResult $b) => $this->hasPassed($b) <=> $this->hasPassed($a),
                ['time_seconds', 'asc'],
            ])
            ->values();

        return view('challenge.results', [
            'challenge' => $challenge,
            'leaderboard' => $leaderboard,
            'passedIds' => $leaderboard->filter(fn (ChallengeResult $r) => $this->hasPassed($r))->pluck('id')->all(),
            'mine' => $challenge->results->firstWhere('participant_session_id', $sessionId),
        ]);
    }

    /**
     * Build the "me vs opponent" payload from the requesting session's point of view.
     */
    private function buildStatusPayload(Challenge $challenge, string $sessionId): array
    {
        $mine = $challenge->results->firstWhere('participant_session_id', $sessionId);
        $opponent = $challenge->results->first(
            fn (ChallengeResult $result) => $result->participant_session_id !== $sessionId
        );

        return [
            'code' => $challenge->code,
            'total_questions' => count($challenge->question_ids),
            'me' => $this->resultPayload($mine),
            'opponent' => $this->resultPayload($opponent),
            'winner' => $this->determineWinner($mine, $opponent),
        ];
    }

    private function resultPayload(?ChallengeResult $result): ?array
    {
        if (!$result) {
            return null;
        }

        return [...$result->toArray(), 'passed' => $this->hasPassed($result)];
    }

    /**
     * 'me', 'opponent', 'draw', or null (someone hasn't finished yet).
     *
     * Whoever passes (real exam rule: wrong answers < 5, i.e. correct_count
     * >= total_questions - 4) beats whoever doesn't, regardless of time.
     * If both passed (or both failed), whoever was faster wins.
     */
    private function determineWinner(?ChallengeResult $mine, ?ChallengeResult $opponent): ?string
    {
        if (!$mine || !$opponent) {
            return null;
        }

        $minePassed = $this->hasPassed($mine);
        $opponentPassed = $this->hasPassed($opponent);

        if ($minePassed !== $opponentPassed) {
            return $minePassed ? 'me' : 'opponent';
        }

        if ($mine->time_seconds !== $opponent->time_seconds) {
            return $mine->time_seconds < $opponent->time_seconds ? 'me' : 'opponent';
        }

        return 'draw';
    }

    private function hasPassed(ChallengeResult $result): bool
    {
        return $result->correct_count >= max(1, $result->total_questions - self::PASS_MAX_WRONG);
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= self::CODE_ALPHABET[random_int(0, strlen(self::CODE_ALPHABET) - 1)];
            }
        } while (Challenge::where('code', $code)->exists());

        return $code;
    }
}
