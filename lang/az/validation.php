<?php

return [

    'required' => ':attribute doldurulması vacibdir.',
    'email' => ':attribute etibarlı e-poçt ünvanı olmalıdır.',
    'unique' => 'Bu :attribute artıq istifadə olunub.',
    'min' => [
        'string' => ':attribute ən azı :min simvol olmalıdır.',
    ],
    'max' => [
        'string' => ':attribute :max simvoldan çox ola bilməz.',
    ],
    'confirmed' => ':attribute təsdiqi uyğun gəlmir.',
    'string' => ':attribute mətn olmalıdır.',
    'integer' => ':attribute rəqəm olmalıdır.',
    'in' => 'Seçilmiş :attribute yanlışdır.',
    'exists' => 'Seçilmiş :attribute mövcud deyil.',

    'attributes' => [
        'full_name' => 'ad soyad',
        'phone' => 'telefon',
        'email' => 'e-poçt',
        'password' => 'şifrə',
        'password_confirmation' => 'şifrə təsdiqi',
        'course_type' => 'kurs',
        'language' => 'tədris dili',
        'preferred_time' => 'əlverişli vaxt',
        'message' => 'şərh',
        'question_id' => 'sual',
        'answer_id' => 'cavab',
        'mode' => 'rejim',
        'time_spent_seconds' => 'sərf olunan vaxt',
    ],

    'custom' => [
        'email' => [
            'required' => 'Zəhmət olmasa e-poçt ünvanını daxil et.',
            'unique' => 'Bu e-poçt ilə artıq hesab qeydiyyatdan keçib.',
        ],
        'password' => [
            'required' => 'Zəhmət olmasa şifrə daxil et.',
            'min' => 'Şifrə ən azı 8 simvol olmalıdır.',
            'confirmed' => 'Şifrələr uyğun gəlmir.',
        ],
    ],

];
