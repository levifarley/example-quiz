<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\Manufacturer;

beforeEach(function () {
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->colorName = 'Black';

    // Create test model
    $this->color = Color::factory()
        ->has(
            Car::factory()->for(
                Manufacturer::factory()->state([
                    'name' => $this->manufacturerName,
                    'tag' => $this->manufacturerTag
                ])
            )
            ->state([
                'model' => $this->carModelName,
            ]),
        )
        ->create([
            'name' => $this->colorName
        ]);
});

it('get cars that can be in a color', function () {
    // Test many-to-many relationship
    $this->assertEquals($this->carModelName, $this->color->all()->last()->car->last()->model);
});
