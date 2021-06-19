<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetAwaitingPostsJob extends Job
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
     * @return Post[]|Collection|void
     */
    public function handle()
    {
        return Post::where('accepted', '=', 0)->get();
    }
}
