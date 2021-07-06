<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetThreadsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return Thread[]|Collection|void
     */
    public function handle()
    {
        return Thread::orderByDesc('created_at')->get();
    }
}
