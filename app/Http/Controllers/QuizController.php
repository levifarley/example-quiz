<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CarQuizRequest;
use App\Jobs\ProcessQuizSubmission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Build and return quiz application
     *
     * @return View
     */
    public function index(): View
    {
        return view('quiz');
    }


    /**
     * Handle quiz submission
     *
     * @param CarQuizRequest $request
     * @return mixed
     */
    public function submit(CarQuizRequest $request): Response
    {
        // TODO: Broadcast model event and send result back to the front-end after submission is processed
        ProcessQuizSubmission::dispatch($request->validated())->afterResponse(); // For now just process immediately

        return response('Accepted', 202);
    }
}
