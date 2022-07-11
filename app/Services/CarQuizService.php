<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use App\Models\CarQuizSubmission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CarQuizService implements QuizServiceInterface
{
    /**
     * Build the required data for a quiz
     *
     * @return Collection
     */
    public function buildDataForDisplay(): Collection
    {
        // TODO: Build quiz options for display: Available manufacturers => Manufacturer's cars => Available colors => Submit Quiz => Thank you
       return collect('data');
    }

    /**
     * Submit quiz results
     *
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): Mixed
    {
        // Log submission
        Log::info('New car quiz submission', $input);

        // Save to database
        return CarQuizSubmission::create([$input]);
    }

}
