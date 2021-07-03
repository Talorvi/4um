<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
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
     * @return array|null
     */
    public function handle(): ?array
    {
        try {
            $result = [];
            $threadBefore = Thread::findOrFail($this->thread_id);
            $result = array_merge($result, $threadBefore->toArray());
            $result['posts'] = [];
            $result['tags'] = $threadBefore
                ->tags()
                ->get()
                ->makeHidden([
                    'pivot'
                ])
                ->toArray();
            foreach ($threadBefore->posts()->where('accepted', '=', 1)->get() as $index => $post) {
                $postAfter = $post->toArray();
                $postAfter['comments'] = [];
                array_push($result['posts'], $postAfter);
                foreach ($post->comments()->get() as $comment) {
                    array_push($result['posts'][$index]['comments'], $comment->toArray());
                }
            }

            return $result;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
