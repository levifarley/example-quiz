<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\QuizServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct(protected QuizServiceInterface $quizService) {}

    /**
     * Build and return quiz application
     *
     */
    public function index(): View|Application
    {
        return view('quiz')->with('data', $this->quizService->buildDataForDisplay());
    }

    /**
     * Handle quiz submission*
     */
    public function submit(Request $request)
    {
        return $this->quizService->handleSubmission($request->all());
    }
}
