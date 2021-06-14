<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Lucid\Units\Job;

class GetThreadJob extends Job
{

    private int $thread_id;

    /**
     * Create a new job instance.
     *
     * @param int $thread_id
     */
    public function __construct(int $thread_id)
    {
        $this->thread_id = $thread_id;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle(): array
    {
        $result = [];
        $threadBefore = Thread::find($this->thread_id);
        $result = array_merge($result, $threadBefore->toArray());
        $result['posts'] = [];
        $result['tags'] = $threadBefore->tags()->get()->toArray();
        foreach ($threadBefore->posts()->get() as $index => $post) {
            $postAfter = $post->toArray();
            $postAfter['comments'] = [];
            array_push($result['posts'], $postAfter);
            foreach ($post->comments()->get() as $comment) {
                array_push($result['posts'][$index]['comments'], $comment->toArray());
            }
        }

        return $result;
    }
}
