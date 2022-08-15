<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\QuizServiceInterface;
use App\View\Composers\QuizComposer;
use Illuminate\Support\Facades\View;
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
        $this->app->bind(QuizServiceInterface::class, function ($app, $quizConfig) {
            dd(new $quizConfig['service']($app->make($quizConfig['model'])));
            return ($quizConfig['service']($app->make($quizConfig['model'])));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('quiz', QuizComposer::class);
    }
}
