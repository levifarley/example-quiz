<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use App\Models\Color;
use Facades\App\Models\Car;
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
        $car = Car::find($input['color']);

        $data = collect($input)
            ->flatMap(function () use ($input, $car) {
                return [
                    'manufacturer_id' => $input['manufacturer'],
                    'model' => $car->get('model')->last()->model,
                    'name' => Color::find($input['car'])->get('name')->last()->name
                ];
            })
            ->toArray();

        // Log submission
        Log::info('New car quiz submission', $input);

        //dd(CarQuizSubmission::create($data));

        // TODO: Save to database - use CarQuizSubmission
        return $car->colors()->attach($input['color']);
    }

}
