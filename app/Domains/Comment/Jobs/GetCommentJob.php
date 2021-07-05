<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use Lucid\Units\Job;

class GetCommentJob extends Job
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
     * @return Comment
     */
    public function handle(): ?Comment
    {
        return Comment::find($this->comment_id);
    }
}
