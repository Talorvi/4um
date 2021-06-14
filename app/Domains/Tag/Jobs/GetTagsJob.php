<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Lucid\Units\Job;
use Illuminate\Database\Eloquent\Collection;

class GetTagsJob extends Job
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
     * @return Tag[]|Collection|void
     */
    public function handle()
    {
        return Tag::all();
    }
}
