<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Exception;
use Lucid\Units\Job;

class DeleteThreadJob extends Job
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
     * @return bool
     */
    public function handle(): bool
    {
        try {
            Thread::findOrFail($this->thread_id)->delete();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
