<?php

return [

    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'unique' => 'This :attribute has already been taken.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'confirmed' => 'The :attribute confirmation does not match.',
    'string' => 'The :attribute must be text.',
    'integer' => 'The :attribute must be a number.',
    'in' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute does not exist.',

    'attributes' => [
        'full_name' => 'full name',
        'phone' => 'phone',
        'email' => 'email',
        'password' => 'password',
        'password_confirmation' => 'password confirmation',
        'course_type' => 'course',
        'language' => 'teaching language',
        'preferred_time' => 'preferred time',
        'message' => 'message',
        'question_id' => 'question',
        'answer_id' => 'answer',
        'mode' => 'mode',
        'time_spent_seconds' => 'time spent',
    ],

    'custom' => [
        'email' => [
            'required' => 'Please enter your email address.',
            'unique' => 'An account with this email is already registered.',
        ],
        'password' => [
            'required' => 'Please enter a password.',
            'min' => 'The password must be at least 8 characters.',
            'confirmed' => 'The passwords do not match.',
        ],
    ],

];
