<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email' => ['required', 'email', 'max:120', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'course_type' => ['required', 'string', 'max:40'],
            'language' => ['required', 'string', 'max:20'],
            'preferred_time' => ['nullable', 'string', 'max:80'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $studentData = $data;
        unset($studentData['password']);
        $studentData['status'] = 'new';

        $student = StudentRegistration::create($studentData);

        session(['student_registration_id' => $student->id]);

        $user = User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        event(new Registered($user));

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('profile.analytics')->with('success', __('messages.booking.success'));
    }

    public function dashboard()
    {
        $studentId = session('student_registration_id');

        if (!$studentId) {
            return redirect()->route('booking')->with('error', __('messages.student_dashboard.need_registration_first'));
        }

        $student = StudentRegistration::find($studentId);

        if (!$student) {
            session()->forget('student_registration_id');
            return redirect()->route('booking')->with('error', __('messages.student_dashboard.registration_not_found'));
        }

        return view('student-dashboard', compact('student'));
    }

    public function logout()
    {
        session()->forget('student_registration_id');

        return redirect()->route('booking')->with('success', __('messages.student_dashboard.logged_out'));
    }
}
