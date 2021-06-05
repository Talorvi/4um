<?php

namespace App\Domains\Comment\Jobs;

use App\Models\Comment;
use Exception;
use Lucid\Units\Job;

class EditCommentJob extends Job
{
    private int $comment_id;
    private ?string $text;

    /**
     * Create a new job instance.
     *
     * @param int $comment_id
     * @param string|null $text
     */
    public function __construct(int $comment_id, ?string $text = null)
    {
        $this->comment_id = $comment_id;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            $comment = Comment::findOrFail($this->comment_id);
            if ($this->text) {
                $comment->text = $this->text;
            }
            $comment->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
