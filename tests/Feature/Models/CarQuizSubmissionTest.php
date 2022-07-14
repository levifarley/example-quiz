<?php

use App\Models\Car;
use App\Models\CarQuizSubmission;
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
        ->hasAttached(Color::factory()->state([
            'name' => $this->colorName
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

it('has a selected car', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->carModelName, CarQuizSubmission::all()->last()->car->model);
});

it('has a selected color', function () {
    // Test many-to-many relationship
    $this->assertEquals($this->colorName, CarQuizSubmission::all()->last()->color->name);
});
