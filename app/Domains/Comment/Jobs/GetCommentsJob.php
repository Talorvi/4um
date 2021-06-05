<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetCommentsJob extends Job
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
     * @return Comment[]|Collection|void
     */
    public function handle()
    {
        return Comment::all();
    }
}
