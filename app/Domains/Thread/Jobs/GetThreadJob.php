<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Lucid\Units\Job;

class GetThreadJob extends Job
{

    private int $thread_id;

    /**
     * Create a new job instance.
     *
     * @param int $thread_id
     */
    public function __construct(int $thread_id)
    {
        $this->thread_id = $thread_id;
    }

    /**
     * Execute the job.
     *
     * @return Thread
     */
    public function handle(): ?Thread
    {
        return Thread::with('posts')->find($this->thread_id);
    }
}
