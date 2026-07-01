<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ExamController;

Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');


Route::get('/booking', [\App\Http\Controllers\StudentRegistrationController::class, 'create'])->name('booking');
Route::post('/booking', [\App\Http\Controllers\StudentRegistrationController::class, 'store'])->name('booking.store');
Route::get('/student/dashboard', [\App\Http\Controllers\StudentRegistrationController::class, 'dashboard'])->name('student.dashboard');
Route::post('/student/logout', [\App\Http\Controllers\StudentRegistrationController::class, 'logout'])->name('student.logout');


Route::view('/materials', 'materials')->name('materials');


Route::get('/test-question', function (\Illuminate\Http\Request $request) {
    $ticket = (int) $request->query('ticket', 1);

    $question = \App\Models\Question::with('answers')
        ->where('ticket_number', $ticket)
        ->first();

    if (! $question) {
        $question = \App\Models\Question::with('answers')
            ->orderBy('ticket_number')
            ->first();
    }

    abort_if(! $question, 404, 'Question not found');

    $currentTicket = (int) $question->ticket_number;

    $nextTicket = \App\Models\Question::where('ticket_number', '>', $currentTicket)
        ->orderBy('ticket_number')
        ->value('ticket_number');

    $prevTicket = \App\Models\Question::where('ticket_number', '<', $currentTicket)
        ->orderByDesc('ticket_number')
        ->value('ticket_number');

    return view('test-question', compact('question', 'currentTicket', 'nextTicket', 'prevTicket'));
})->name('test.question');

