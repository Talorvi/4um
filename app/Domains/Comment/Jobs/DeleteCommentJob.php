<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use Exception;
use Lucid\Units\Job;

class DeleteCommentJob extends Job
{
    private int $comment_id;

    /**
     * Create a new job instance.
     *
     * @param int $comment_id
     */
    public function __construct(int $comment_id)
    {
        $this->comment_id = $comment_id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            Comment::findOrFail($this->comment_id)->delete();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
