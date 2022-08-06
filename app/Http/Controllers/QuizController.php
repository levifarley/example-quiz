<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CarQuizRequest;
use App\Jobs\ProcessQuizSubmission;
use Illuminate\Http\Response;

class QuizController extends Controller
{
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
