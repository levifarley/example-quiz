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
});

it('has an index page', function () {
    $this->get('/')->assertStatus(200);
});

it('submits quiz input', function () {
    // Setup test models
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

    // Set test data
    $input = [
        'manufacturer' => 1,
        'car' => 1,
        'color' => 1
    ];

    $this->post('/api/submit', $input)->assertStatus(202);
});
