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
     * Build the required data for a quiz to be displayed
     *
     * @return Collection
     */
    public function buildDataForDisplay(): Collection
    {
        // Available manufacturers => Manufacturer's cars => Available colors => Submit Quiz => Thank you
       return collect('data');
    }

    /**
     * Submit quiz results
     *
     * @param Collection $input
     * @return mixed
     */
    public function handleSubmission(Collection $input): mixed
    {
        // Log submission
        Log::info('New car quiz submission', $input->toArray());

        // Save to database
        return CarQuizSubmission::create($input); // TODO: dd($result)
    }

}
