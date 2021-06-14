<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class GetUserJob extends Job
{
    private int $user_id;

    /**
     * Create a new job instance.
     *
     * @param int $user_id
     */
    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return User
     */
    public function handle(): ?User
    {
        return User::find($this->user_id);
    }
}
