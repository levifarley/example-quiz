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
    $this->car = Car::factory()
        ->for(Manufacturer::factory()->state([
            'name' => $this->manufacturerName,
            'tag' => $this->manufacturerTag
        ]))
        ->has(Color::factory()->state([
            'name' => $this->colorName,
        ]))
        ->create([
            'model' => $this->carModelName
        ]);
});

it('belongs to a manufacturer', function () {
    // Test one-to-many relationship
    $this->assertEquals($this->manufacturerName, $this->car->all()->last()->manufacturer->name);
});

it('can have many colors', function () {
    // Test many-to-many relationship
    $this->assertEquals($this->colorName, $this->car->all()->last()->colors->last()->name);
});
