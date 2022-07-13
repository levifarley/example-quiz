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
    Color::factory()
        ->has(Car::factory()
                ->for(Manufacturer::factory()->state([
                    'name' => $this->manufacturerName,
                    'tag' => $this->manufacturerTag
                ]))
                ->state([
                    'model' => $this->carModelName
        ]))
        ->create([
            'name' => $this->colorName
        ]);
});

it('gets all cars a color can belong to', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->carModelName, Color::all()->last()->cars->last()->model);
});

