<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use App\Models\Car;
use App\Models\Color;
use App\Models\Manufacturer;
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
        // Select a manufacturer => car => color => submit => message;
        return collect([
            ['question' => 'If you were going on a vacation, what car would you choose?'],
            ['Select a manufacturer' => Manufacturer::with('car')->get()->pluck('name', 'id')],
            ['Select a car' => Car::all()->pluck('model', 'id')], // TODO: Reduce cars based on manufacturer relationship
            ['Select a color' => Color::pluck('name', 'id')],
            ['submit' => route('submit')],
            ['message' => 'Thank you for your submission.']
        ]);
    }

    /**
     * Submit quiz results
     *
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): mixed
    {
        // Get the car model
        $car = Car::find($input['car']);

        // Translate input to required data for insert
        $data = collect($input)
            ->flatMap(fn() => [
                'manufacturer_id' => $input['manufacturer'],
                'model' => $car->get('model')->last()->model,
                'name' => Color::find($input['color'])->get('name')->last()->name,
                'submission_type' => 'submission'
            ])
            ->toArray();

        // Log submission
        Log::info('New car quiz submission', $data);

        // Insert new submission record into database
        return $car->save();
    }

    protected function getMostPopularCarAndColor() {} // TODO:

    protected function getMostPopularCar() {} // TODO:

    protected function getMostPopularColor() {} // TODO:
}
