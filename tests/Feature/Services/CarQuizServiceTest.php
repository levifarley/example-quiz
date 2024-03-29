<?php

use App\Models\Car;
use App\Models\CarQuizSubmission;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Services\CarQuizService;

beforeEach(function () {
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->colorName = 'Black';

    // Create test data
    $car = Car::factory()
        ->has(Color::factory()->state([
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
        'car' => $car->id,
        'color' => $car->colors()->get()->last()->id
    ];

    // Instantiate service to test
    $this->service = new CarQuizService(new CarQuizSubmission);
});

it('builds data for display', function () {
    expect($this->service->buildDataForDisplay())->toBeCollection();
});

it('handles quiz submissions', function () {
    $this->assertIsInt($this->service->handleSubmission($this->input));
});

