<?php

return [

    'required' => ':attribute-ის შევსება სავალდებულოა.',
    'email' => ':attribute უნდა იყოს ვალიდური ელ-ფოსტის მისამართი.',
    'unique' => 'ეს :attribute უკვე დაკავებულია.',
    'min' => [
        'string' => ':attribute უნდა შეიცავდეს მინიმუმ :min სიმბოლოს.',
    ],
    'max' => [
        'string' => ':attribute არ უნდა აღემატებოდეს :max სიმბოლოს.',
    ],
    'confirmed' => ':attribute არ ემთხვევა დადასტურებას.',
    'string' => ':attribute უნდა იყოს ტექსტი.',
    'integer' => ':attribute უნდა იყოს მთელი რიცხვი.',
    'in' => 'არჩეული :attribute არასწორია.',
    'exists' => 'არჩეული :attribute არ არსებობს.',

    'attributes' => [
        'full_name' => 'სახელი გვარი',
        'phone' => 'ტელეფონი',
        'email' => 'ელ-ფოსტა',
        'password' => 'პაროლი',
        'password_confirmation' => 'პაროლის დადასტურება',
        'course_type' => 'კურსი',
        'language' => 'სწავლების ენა',
        'preferred_time' => 'სასურველი დრო',
        'message' => 'კომენტარი',
        'question_id' => 'კითხვა',
        'answer_id' => 'პასუხი',
        'mode' => 'რეჟიმი',
        'time_spent_seconds' => 'დახარჯული დრო',
    ],

    'custom' => [
        'email' => [
            'required' => 'ელ-ფოსტის მითითება სავალდებულოა.',
            'unique' => 'ამ ელ-ფოსტით მომხმარებელი უკვე რეგისტრირებულია.',
        ],
        'password' => [
            'required' => 'პაროლის შევსება სავალდებულოა.',
            'min' => 'პაროლი უნდა შეიცავდეს მინიმუმ 8 სიმბოლოს.',
            'confirmed' => 'პაროლები არ ემთხვევა ერთმანეთს.',
        ],
    ],

];
