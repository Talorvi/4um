<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Lucid\Units\QueueableJob;

class ProcessPostJob extends QueueableJob
{
    private Post $post;

    /**
     * Create a new job instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->onQueue('posts');
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $testCommand = escapeshellcmd('python3 /var/www/4um/ai/test.py "'.$this->post->text.'"');
        $output = shell_exec($testCommand);

        if ($output < 0.3) {
            $this->post->accepted = 1;
            $this->post->save();
        }
        else {
            $this->post->accepted = 0;
            $this->post->save();
            /**
             * TODO: add notification
             */
        }
    }
}
