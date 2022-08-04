<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Interfaces\QuizServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessQuizSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $data
     */
    public function __construct(protected array $data) {}

    /**
     * Execute the job.
     *
     * @param QuizServiceInterface $quizService
     * @return mixed
     */
    public function handle(QuizServiceInterface $quizService): mixed
    {
        return $quizService->handleSubmission($this->data);
    }
}
