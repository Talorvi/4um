<?php

namespace App\Domains\Comment\Jobs;

use App\Events\CommentAdded;
use App\Models\Comment;
use App\Models\User;
use Lucid\Units\Job;

class AddCommentJob extends Job
{
    private string $text;
    private User $user;
    private int $post_id;

    /**
     * Create a new job instance.
     *
     * @param string $text
     * @param User $user
     * @param int $post_id
     */
    public function __construct(string $text, User $user, int $post_id)
    {
        $this->text = $text;
        $this->user = $user;
        $this->post_id = $post_id;
    }

    /**
     * Execute the job.
     *
     * @return Comment
     */
    public function handle(): Comment
    {
        return Comment::create([
            'text'    => $this->text,
            'user_id' => $this->user->id,
            'post_id' => $this->post_id
        ]);
    }
}
