<?php

return [

    'required' => ':attribute alanı zorunludur.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'unique' => 'Bu :attribute zaten kullanılıyor.',
    'min' => [
        'string' => ':attribute en az :min karakter olmalıdır.',
    ],
    'max' => [
        'string' => ':attribute en fazla :max karakter olabilir.',
    ],
    'confirmed' => ':attribute doğrulaması eşleşmiyor.',
    'string' => ':attribute bir metin olmalıdır.',
    'integer' => ':attribute bir sayı olmalıdır.',
    'in' => 'Seçilen :attribute geçersiz.',
    'exists' => 'Seçilen :attribute mevcut değil.',

    'attributes' => [
        'full_name' => 'ad soyad',
        'phone' => 'telefon',
        'email' => 'e-posta',
        'password' => 'şifre',
        'password_confirmation' => 'şifre doğrulama',
        'course_type' => 'kurs',
        'language' => 'eğitim dili',
        'preferred_time' => 'tercih edilen zaman',
        'message' => 'mesaj',
        'question_id' => 'soru',
        'answer_id' => 'cevap',
        'mode' => 'mod',
        'time_spent_seconds' => 'harcanan süre',
    ],

    'custom' => [
        'email' => [
            'required' => 'Lütfen e-posta adresini gir.',
            'unique' => 'Bu e-posta ile zaten bir hesap kayıtlı.',
        ],
        'password' => [
            'required' => 'Lütfen bir şifre gir.',
            'min' => 'Şifre en az 8 karakter olmalıdır.',
            'confirmed' => 'Şifreler eşleşmiyor.',
        ],
    ],

];
