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


Route::get('/test-question', function () {
    $question = \App\Models\Question::with('answers')->inRandomOrder()->first();
    return view('test-question', compact('question'));
})->name('test.question');

