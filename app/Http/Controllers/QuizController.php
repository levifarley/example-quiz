<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\QuizServiceInterface;
use App\Jobs\ProcessQuizSubmission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Handle quiz submission
     *
     * @param Request $request
     * @return mixed
     */
    public function submit(Request $request): Response
    {
        // TODO: Broadcast model event and send result back to the front-end after submission is processed
        return ProcessQuizSubmission::dispatch($request); // fires off CarQuizService->handleSubmission($request->collect());
        //return response()->isSuccessful(); // TODO: Return job response instead?
    }
}
