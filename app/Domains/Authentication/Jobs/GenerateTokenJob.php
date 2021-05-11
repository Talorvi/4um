<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Contracts\Auth\Authenticatable;
use Lucid\Units\Job;

class GenerateTokenJob extends Job
{
    private Authenticatable $user;

    /**
     * Create a new job instance.
     *
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle(): array
    {
        return [
            'token' => $this->user->createToken('authToken')->accessToken
        ];
    }
}