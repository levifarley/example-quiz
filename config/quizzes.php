<?php

/*
 * Register quiz types
 */
return [
    'quiz_types' => [
        'car' => [
            'service' => \App\Services\CarQuizService::class,
            'model' => \App\Models\CarQuizSubmission::class,
            'validation_rules' => [
                'quiz_type' => 'required|string',
                'car' => 'required|integer',
                'color' => 'required|integer'
            ]
            //'allow_submissions' => true
        ]
    ]
];
