<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface QuizServiceInterface
{
    /**
     * Build data required for quiz
     *
     * @return Collection
     */
    public function buildDataForDisplay(): Collection;


    /**
     * Handle quiz submissions
     *
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): mixed;
}
