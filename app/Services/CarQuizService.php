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
    public function __construct(protected $model) {}

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
