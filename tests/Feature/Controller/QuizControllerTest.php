<?php

it('has an index page', function () {
    $this->get('/')->assertStatus(200);
});

it('submits quiz input', function () {
    // Set test data
    $input = [
        'car_id' => 1,
        'color_id' => 1
    ];

    $this->post('/api/submit', $input)->assertStatus(202);
});
