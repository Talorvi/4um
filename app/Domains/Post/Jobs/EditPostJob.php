<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Exception;
use Lucid\Units\Job;

class EditPostJob extends Job
{
    private int $post_id;
    private ?string $text;

    /**
     * Create a new job instance.
     *
     * @param int $post_id
     * @param string|null $text
     */
    public function __construct(int $post_id, ?string $text = null)
    {
        $this->post_id = $post_id;
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
            $post = Post::findOrFail($this->post_id);
            if ($this->text) {
                $post->text = $this->text;
            }
            $post->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
