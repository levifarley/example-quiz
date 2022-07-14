<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\ProcessQuizSubmission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Build and return quiz application
     * @return View
     */
    public function index(): View
    {
        return view('quiz');
    }


    /**
     * Handle quiz submission
     *
     * @param Request $request
     * @return mixed
     */
    public function submit(Request $request): Response
    {
        // TODO: Use custom form requests to handle validation for multiple quiz types
        $validatedData = $request->validate([
            'manufacturer' => 'required|integer',
            'car' => 'required|integer',
            'color' => 'required|integer'
        ]);

        // TODO: Broadcast model event and send result back to the front-end after submission is processed
        ProcessQuizSubmission::dispatch($validatedData)->afterResponse(); // For now just process immediately

        return response('Accepted', 202);
    }
}
