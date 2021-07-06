<?php

namespace App\Domains\Notification\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class DeleteAllNotificationsJob extends Job
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
        Auth::user()->notifications()->delete();
    }
}
