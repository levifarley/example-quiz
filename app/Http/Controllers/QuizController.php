<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\QuizServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * @param QuizServiceInterface $quizService
     */
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
        // TODO: Use custom form requests for multiple quiz types
        $validatedData = $request->validate([
            'manufacturer' => 'required|integer',
            'car' => 'required|integer',
            'color' => 'required|integer'
        ]);

        // TODO: Broadcast model event and send result back to the front-end after submission is processed
        //ProcessQuizSubmission::dispatch($validatedData); // For now just process immediately
        $this->quizService->handleSubmission($validatedData);
        return response('Accepted', 202);
    }
}
