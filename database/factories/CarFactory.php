<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Car model => manufacturer_id
        $cars = collect([
            'Camaro' => 1,
            'Blazer' => 1,
            'Colorado' => 1,
            'Mustang' => 2,
            'Explorer' => 2,
            'Camry' => 3,
            'Tacoma' => 3,
            'Corolla' => 3,
            'Civic' => 4,
            'Accord' => 4,
            'Jetta' => 5
        ])
        ->map(function (int $manufacturer, string $model): array {
            // Build our example cars data
            return [
                'manufacturer_id' => $manufacturer,
                'model' => $model,
            ];
        })
        ->values()
        ->toArray();

        return fake()->unique()->randomElement($cars);
    }
}
