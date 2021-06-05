<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Lucid\Units\Job;

class GetPostJob extends Job
{
    private int $post_id;

    /**
     * Create a new job instance.
     *
     * @param int $post_id
     */
    public function __construct(int $post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Execute the job.
     *
     * @return Post
     */
    public function handle(): ?Post
    {
        return Post::find($this->post_id);
    }
}
