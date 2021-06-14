<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Lucid\Units\Job;

class AddThreadJob extends Job
{
    private string $title;
    private string $text;
    private ?array $tags;
    private User $user;

    /**
     * Create a new job instance.
     *
     * @param string $title
     * @param string $text
     * @param User $user
     * @param array|null $tags
     */
    public function __construct(string $title, string $text, User $user, ?array $tags)
    {
        $this->title = $title;
        $this->text = $text;
        $this->user = $user;
        $this->tags = $tags;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $thread = Thread::create([
            'title'   => $this->title,
            'text'    => $this->text,
            'user_id' => $this->user->id
        ]);

        if ($this->tags) {
            $thread->tags()->sync($this->tags);
        }

        return $thread;
    }
}
