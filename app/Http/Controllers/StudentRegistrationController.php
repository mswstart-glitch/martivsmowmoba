<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function create()
    {
        return view('booking');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:120'],
            'course_type' => ['required', 'string', 'max:40'],
            'language' => ['required', 'string', 'max:20'],
            'preferred_time' => ['nullable', 'string', 'max:80'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['status'] = 'new';

        $student = StudentRegistration::create($data);

        session(['student_registration_id' => $student->id]);

        return redirect()->route('student.dashboard')->with('success', 'რეგისტრაცია წარმატებით დასრულდა.');
    }

    public function dashboard()
    {
        $studentId = session('student_registration_id');

        if (!$studentId) {
            return redirect()->route('booking')->with('error', 'შიდა პანელზე შესასვლელად ჯერ გაიარე რეგისტრაცია.');
        }

        $student = StudentRegistration::find($studentId);

        if (!$student) {
            session()->forget('student_registration_id');
            return redirect()->route('booking')->with('error', 'რეგისტრაცია ვერ მოიძებნა.');
        }

        return view('student-dashboard', compact('student'));
    }

    public function logout()
    {
        session()->forget('student_registration_id');

        return redirect()->route('booking')->with('success', 'პანელიდან გამოხვედი.');
    }
}
