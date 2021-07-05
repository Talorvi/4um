<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Lucid\Units\Job;

class RespondWithJsonResponseErrorJob extends Job
{
    private array $errors;

    /**
     * Create a new job instance.
     *
     * @param $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Execute the job.
     *
     * @return JsonResponse
     */
    public function handle(): JsonResponse
    {
        return response()->json([
            'errors'   => $this->errors,
            'status' => Response::HTTP_BAD_REQUEST
        ], Response::HTTP_BAD_REQUEST);
    }
}
