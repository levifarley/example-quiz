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

    // Setup test models
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

    // Set test data
    $this->input = [
        'quiz_type' => 'car',
        'car' => $car->id,
        'color' => $car->colors()->get()->last()->id
    ];
});

it('has an index page', function () {
    $this->get('/')->assertStatus(200);
});

it('submits quiz input', function () {
    $this->post('/api/submit', $this->input)->assertStatus(202);
});
