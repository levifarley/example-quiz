<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\Manufacturer;

beforeEach(function () {
    Car::query()->delete();
    // Set test parameters
    $this->manufacturerName = 'Chevrolet';
    $this->carModelName = 'Colorado';
    $this->manufacturerTag = 'domestic';
    $this->color = 'Black';

    // Create test model
    Car::factory()
        ->for(Manufacturer::factory()->state([
            'name' => $this->manufacturerName,
            'tag' => $this->manufacturerTag
        ]))
        ->has(Color::factory()->state([
            'name' => $this->color
        ]))
        ->createOne([
            'model' => $this->carModelName
        ]);
});

it('belongs to a manufacturer', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->manufacturerName, Car::all()->last()->manufacturer->name);
});

it('can have many colors', function () {
    // Test many-to-many relationship
    $this->assertEquals($this->color, Car::all()->last()->colors->last()->name);
});


