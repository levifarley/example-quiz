<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ManufacturerFactory extends Factory
{
    protected array $manufacturers = [
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
        ]
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return fake()->unique()->randomElement($this->manufacturers);
    }

    /**
     * Get manufacturers
     *
     * @return array
     */
    public function getManufacturers(): array
    {
        return $this->manufacturers;
    }
}
