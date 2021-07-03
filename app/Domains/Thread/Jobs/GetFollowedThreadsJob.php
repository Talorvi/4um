<?php

namespace App\Domains\Thread\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class GetFollowedThreadsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Auth::user()->followedThreads;
    }
}
