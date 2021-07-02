<?php

namespace App\Domains\Post\Jobs;

use App\Events\PostAdded;
use App\Events\PostProcessed;
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

                /**
                 * Notifies the thread author that someone added a post to his/hers thread
                 */
                event(new PostAdded('Someone added a post to your thread', $post->thread_id, $post->thread->user_id, $post->user_id));

                /**
                 * Notifies all followers
                 */
                foreach ($post->thread->followers as $follower) {
                    event(new PostAdded('Someone added a post you follow', $post->thread_id, $follower["user_id"], $post->user_id));
                }
            }
            else {
                event(new PostProcessed('Your post has been deleted', $post->id, $post->thread_id, $post->user_id));
                $post->delete();
            }
            $post->save();
            return true;
        }
        catch (Exception $e) {
            event(new PostProcessed('Your post has been deleted', $post->id, $post->thread_id, $post->user_id));
            return false;
        }
    }
}
