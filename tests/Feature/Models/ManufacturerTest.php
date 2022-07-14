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
    Car::factory()
        ->has(Color::factory()->state([
            'name' => $this->colorName,
        ]))
        ->for(Manufacturer::factory()->state([
            'name' => $this->manufacturerName,
            'tag' => $this->manufacturerTag
        ]))
        ->state([
            'model' => $this->carModelName
        ])
        ->create();
});

it('gets a manufacturer\'s cars', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->carModelName, Manufacturer::all()->last()->car->last()->model);
});
