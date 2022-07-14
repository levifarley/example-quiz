<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\Manufacturer;
use Facades\App\Services\CarQuizService;

beforeEach(function () {
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->colorName = 'Black';

    // Create test model
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
        'manufacturer' => $car->manufacturer()->get()->last()->id,
        'car' => $car->id,
        'color' => $car->colors()->get()->last()->id
    ];
});

it('builds data for display', function () {
    expect(CarQuizService::buildDataForDisplay())->toBeCollection();
});

it('handles quiz submissions', function () {
    expect(CarQuizService::handleSubmission($this->input))->toBeTrue();
});
