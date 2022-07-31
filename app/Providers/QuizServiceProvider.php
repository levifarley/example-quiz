<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\QuizServiceInterface;
use App\Models\CarQuizSubmission;
use App\Services\CarQuizService;
use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // We only have one quiz type, so we will just use it by default
        $this->app->bind(QuizServiceInterface::class, function ($app) {
            return new CarQuizService($app->make(CarQuizSubmission::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
