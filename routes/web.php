<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\NewsController;

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

use App\Http\Controllers\ExamController;

Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');


Route::get('/booking', [\App\Http\Controllers\StudentRegistrationController::class, 'create'])->name('booking');
Route::post('/booking', [\App\Http\Controllers\StudentRegistrationController::class, 'store'])->name('booking.store');
Route::get('/student/dashboard', [\App\Http\Controllers\StudentRegistrationController::class, 'dashboard'])->name('student.dashboard');
Route::post('/student/logout', [\App\Http\Controllers\StudentRegistrationController::class, 'logout'])->name('student.logout');


Route::view('/materials', 'materials')->name('materials');


use App\Http\Controllers\UserAnalyticsController;

Route::middleware('auth')->group(function () {
    Route::post('/api/attempt', [UserAnalyticsController::class, 'saveAttempt'])->name('attempts.store');
    Route::get('/profile/analytics', [UserAnalyticsController::class, 'analytics'])->name('profile.analytics');
});


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


use App\Http\Controllers\LanguageController;

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');


use App\Http\Controllers\ChallengeController;

Route::post('/challenge/create', [ChallengeController::class, 'create'])->name('challenge.create');
Route::get('/challenge/{code}', [ChallengeController::class, 'show'])->name('challenge.show');
Route::get('/challenge/{code}/start', [ChallengeController::class, 'start'])->name('challenge.start');
Route::post('/challenge/{code}/result', [ChallengeController::class, 'storeResult'])->name('challenge.result');
Route::get('/challenge/{code}/results', [ChallengeController::class, 'results'])->name('challenge.results');


require __DIR__.'/admin.php';

