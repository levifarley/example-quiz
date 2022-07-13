<?php

use App\Services\CarQuizService;

beforeEach(function () {
    $this->service = new CarQuizService();
});

it('builds data for display', function () {
    expect($this->service->buildDataForDisplay())->toBeCollection(); // TODO:
});

it('handles quiz submissions', function () {
    //expect($this->service->handleSubmission([]))->toBeCollection(); // TODO:
});
