<?php

use App\Models\Car;
use App\Models\Manufacturer;

it('has car page', function () {
    // Test one-to-many relationship
    Car::factory()
        ->for(Manufacturer::factory()->state([
            'name' => 'Nissan',
            'tag' => 'import'
        ]))
        ->create([
            'model' => 'Skyline'
        ]);

    $this->assertEquals('Nissan', Car::find(1)->manufacturer()->first()->name);
});
