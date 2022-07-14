<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Interfaces\QuizServiceInterface;
use Illuminate\View\View;

class QuizComposer
{
    /**
     * Create a new profile composer.
     *
     * @param QuizServiceInterface $quizService
     */
    public function __construct(protected QuizServiceInterface $quizService) {}

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('data', $this->quizService->buildDataForDisplay());
    }
}
