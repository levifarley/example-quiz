<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CarQuizService implements QuizServiceInterface
{
    /**
     * @param Model $carQuizSubmissions
     */
    public function __construct(protected Model $carQuizSubmissions) {}

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
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): mixed
    {
        // Log submission
        Log::info('New car quiz submission', $input);

        // TODO: Save to database
        return collect();
    }

}
