<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetUsersJob extends Job
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
     * @return User[]|Collection|void
     */
    public function handle()
    {
        return User::all();
    }
}
