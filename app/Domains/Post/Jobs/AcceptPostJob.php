<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Exception;
use Lucid\Units\Job;

class AcceptPostJob extends Job
{
    private int $post_id;
    private bool $accepted;

    /**
     * Create a new job instance.
     *
     * @param int $post_id
     * @param bool $accepted
     */
    public function __construct(int $post_id, bool $accepted)
    {
        $this->post_id = $post_id;
        $this->accepted = $accepted;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            $post = Post::withTrashed()->findOrFail($this->post_id);
            if ($this->accepted) {
                $post->accepted = $this->accepted;
                $post->restore();
            }
            else {
                $post->delete();
            }
            $post->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
