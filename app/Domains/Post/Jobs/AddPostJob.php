<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\User;
use Lucid\Units\Job;

class AddPostJob extends Job
{
    private string $text;
    private User $user;
    private int $thread_id;

    /**
     * Create a new job instance.
     *
     * @param string $text
     * @param User $user
     * @param int $thread_id
     */
    public function __construct(string $text, User $user, int $thread_id)
    {
        $this->text = $text;
        $this->user = $user;
        $this->thread_id = $thread_id;
    }

    /**
     * Execute the job.
     *
     * @return Post
     */
    public function handle()
    {
        return Post::create([
            'text'      => $this->text,
            'user_id'   => $this->user->id,
            'thread_id' => $this->thread_id,
            'accepted'  => 0
        ]);
    }
}
