<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface QuizServiceInterface
{
    // Build data required for quiz
    public function buildDataForDisplay(): Collection;

    // Handle quiz submissions
    public function handleSubmission(Collection $input): mixed;
}
