<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Exception;
use Lucid\Units\Job;

class DeletePostJob extends Job
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
     * @return bool
     */
    public function handle(): bool
    {
        try {
            Post::findOrFail($this->post_id)->delete();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
