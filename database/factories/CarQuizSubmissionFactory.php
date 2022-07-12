<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Car;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CarQuizSubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'car_id' => fake()->randomElement(Car::all()->pluck('id')),
            'color_id' => fake()->randomElement(Color::all()->pluck('id'))
        ];
    }
}
