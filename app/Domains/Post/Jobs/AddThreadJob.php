<?php

namespace App\Domains\Post\Jobs;

use App\Data\Thread;
use App\Models\User;
use Lucid\Units\Job;

class AddThreadJob extends Job
{
    private string $title;
    private string $text;
    private User $user;

    /**
     * Create a new job instance.
     *
     * @param string $title
     * @param string $text
     * @param User $user
     */
    public function __construct(string $title, string $text, User $user)
    {
        $this->title = $title;
        $this->text = $text;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Thread::create([
            'title'   => $this->title,
            'text'    => $this->text,
            'user_id' => $this->user->id
        ]);
    }
}
