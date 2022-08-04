<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\QuizServiceInterface;
use App\Models\Color;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CarQuizService implements QuizServiceInterface
{
    public function __construct(protected Model $model) {}

    /**
     * Build the required data for a quiz to be displayed
     *
     * @return Collection
     */
    public function buildDataForDisplay(): Collection
    {
        $manufacturers = Manufacturer::with('cars', 'cars.colors')->get();
        //dd($manufacturers);
        $steps = [
            // Select a manufacturer => car => color => submit => response;
            ['question' => 'If you were going on a vacation, what car would you choose?'],
            ['Select a manufacturer' => $manufacturers->pluck('name', 'id')],
            ['Select a car' => \App\Models\Car::all()->pluck('model', 'id')],
            //['Select a car' => $manufacturers->mapWithKeys(fn($manufacturer) => [$manufacturer->id => $manufacturer->cars->pluck('model', 'id')])], TODO: Fix blade
            ['Select a color' => Color::pluck('name', 'id')], // Get all colors
            ['submit' => route('submit')],
            ['response' => 'Thank you for your submission.']
        ];

        return collect($steps);
    }

    /**
     * Submit quiz results
     *
     * @param array $input
     * @return mixed
     */
    public function handleSubmission(array $input): mixed
    {
        // Format input data for insert
        $data = collect($input)
            ->flatMap(fn() => [
                'car_id' => $input['car'],
                'color_id' => $input['color']
            ])
            ->toArray();

        // Log submission
        Log::info('New car quiz submission', $data);

        // Insert new submission record into database
        return $this->model->create($data)->id;
    }

    protected function getMostPopularCarAndColor() {} // TODO:

    protected function getMostPopularCar() {} // TODO:

    protected function getMostPopularColor() {} // TODO:
}
