<?php

namespace App\Domains\Notification\Jobs;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class GetNotificationsJob extends Job
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
     * @return Notification[]|Collection|void
     */
    public function handle()
    {
        return Notification::where('user_id', '=', Auth::user()->id)->get();
    }
}
