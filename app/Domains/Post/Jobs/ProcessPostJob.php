<?php

namespace App\Domains\Post\Jobs;

use App\Events\PostAdded;
use App\Events\PostProcessed;
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

            /**
             * Notifies the author that his post has been processed
             */
            event(new PostProcessed('Successfully processed the post', $this->post->id, $this->post->thread_id, $this->post->user_id));

            /**
             * Notifies the thread author that someone added a post to his/hers thread
             */
            event(new PostAdded('Someone added a post to your thread', $this->post->thread_id, $this->post->thread->user_id, $this->post->user_id));

            /**
             * Notifies all followers
             */
            foreach ($this->post->thread->followers as $follower) {
                event(new PostAdded('Someone added a post you follow', $this->post->thread_id, $follower["user_id"], $this->post->user_id));
            }
        }
        else {
            $this->post->accepted = 0;
            $this->post->save();

            /**
             * Notifies the author that his post has been processed
             */
            event(new PostProcessed('Your post has been marked as offensive. Moderation will investigate that.', $this->post->id, $this->post->thread_id, $this->post->user_id));
        }

    }
}
