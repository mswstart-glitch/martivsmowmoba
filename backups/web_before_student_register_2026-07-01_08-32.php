<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ExamController;

Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');
