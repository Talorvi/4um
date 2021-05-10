<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Http\Response;
use Lucid\Units\Job;

class RespondWithJsonResponseErrorJob extends Job
{
    private $errors;

    /**
     * Create a new job instance.
     *
     * @param $errors
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        return response()->json([
            'errors'   => $this->errors,
            'status' => Response::HTTP_BAD_REQUEST
        ], Response::HTTP_BAD_REQUEST);
    }
}
