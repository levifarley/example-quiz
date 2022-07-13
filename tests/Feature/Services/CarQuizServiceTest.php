<?php

use App\Models\CarQuizSubmission;
use App\Services\CarQuizService;

beforeEach(function () {
   // Setup test data with factories
    $this->carQuizService = new CarQuizService(new CarQuizSubmission());
});

it('builds data for display', function () {
    expect($this->carQuizService->buildDataForDisplay())->toBeCollection();
});

it('handles quiz submissions', function () {
    // TODO:
});
