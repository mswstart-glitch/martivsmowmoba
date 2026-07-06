<?php

namespace App\Http\Controllers;

use App\Models\DrivingQuestion;

class ExamController extends Controller
{
    public function index()
    {
        $questions = DrivingQuestion::with(['answers.translations', 'translations'])->orderBy('id')->take(5)->get();

        return view('exam.index', compact('questions'));
    }
}
