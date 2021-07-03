<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Lucid\Units\QueueableJob;

class RemoveUnusedTagsJob extends QueueableJob
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->onQueue('tags');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tags = Tag::all();
        foreach ($tags as $tag) {
            if ($tag->threads()->count() == 0) {
                $tag->delete();
            }
        }
    }
}
