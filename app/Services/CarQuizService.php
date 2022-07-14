<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use App\Models\Car;
use App\Models\Color;
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
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): mixed
    {
        //$inputCollection?

        // Get the car model
        $car = Car::find($input['car']);

        // Translate input to required data for insert
        $data = collect($input)
            ->flatMap(function () use ($input, $car) {
                return [
                    'manufacturer_id' => $input['manufacturer'],
                    'model' => $car->get('model')->last()->model,
                    'name' => Color::find($input['color'])->get('name')->last()->name,
                ];
            })
            ->toArray();

        // Log submission
        Log::info('New car quiz submission', $data);

        // Insert new submission record into database
        return $car->colors()->attach($input['color']);
    }

}
