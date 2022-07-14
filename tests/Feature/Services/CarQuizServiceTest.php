<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Services\CarQuizService;

beforeEach(function () {
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->colorName = 'Black';

    // Create test model
    $car = Car::factory()
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

    // Set test input data
    $this->input = [
        'manufacturer' => $car->manufacturer()->get()->last()->id,
        'car' => $car->id,
        'color' => $car->colors()->get()->last()->id
    ];

    $this->carQuizService = new CarQuizService();// TODO: clean this up?
});

it('builds data for display', function () {
    expect($this->carQuizService->buildDataForDisplay())->toBeCollection();
});

it('handles quiz submissions', function () {
    expect($this->carQuizService->handleSubmission($this->input))->toBeNull();
});
