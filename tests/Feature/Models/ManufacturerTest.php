<?php

use App\Models\Car;
use App\Models\Manufacturer;

beforeEach(function () {
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->colorName = 'Black';

    // Create test model
    Manufacturer::factory()
        ->has(Car::factory()->state([
            'model' => $this->carModelName
        ]))
        ->create();
});

it('gets a manufacturer\'s cars', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->carModelName, Manufacturer::all()->last()->cars->last()->model);
});
