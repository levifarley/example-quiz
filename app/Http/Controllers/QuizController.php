<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\QuizServiceInterface;
use App\Jobs\ProcessQuizSubmission;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Build and return quiz
     *
     * @param Request $request
     * @return View
     * @throws BindingResolutionException
     */
    public function index(Request $request): View // TODO: Make name more generic - ex: quiz(), show()
    {
        // TODO: Get request's route for quiz type and make service, handle exception
        $quizType = $request->path() !== '/' ? $request->path() : 'car';
        app()->makeWith(QuizServiceInterface::class, config('quizzes.quiz_types.' . $quizType));
        return view('quiz'); // TODO: Extend quiz blade for car quiz? Make this more dynamic?
    }

    /**
     * Handle quiz submission
     *
     * @param $request
     * @return mixed
     */
    public function submit($request): Response
    {
        // TODO: Get hidden quiz_type field and make service
        //app()->makeWith(QuizServiceInterface::class. $quizType)

        // TODO: Broadcast model event and send result back to the front-end after submission is processed
        ProcessQuizSubmission::dispatch($request->validated())->afterResponse(); // For now just process immediately

        return response('Accepted', 202);
    }
}
