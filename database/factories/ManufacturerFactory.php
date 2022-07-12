<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $manufacturers = [
            [
                'name' => 'Chevrolet',
                'tag' => 'domestic'
            ],
            [
                'name' => 'Ford',
                'tag' => 'domestic'
            ],
            [
                'name' => 'Toyota',
                'tag' => 'import'
            ],
            [
                'name' => 'Honda',
                'tag' => 'import'
            ],
            [
                'name' => 'Volkswagen',
                'tag' => 'euro'
            ],
        ];

        return fake()->unique()->randomElement($manufacturers);
    }
}
