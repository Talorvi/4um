<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Lucid\Units\Job;

class GetTagJob extends Job
{
    private int $tag_id;

    /**
     * Create a new job instance.
     *
     * @param int $tag_id
     */
    public function __construct(int $tag_id)
    {
        $this->tag_id = $tag_id;
    }

    /**
     * Execute the job.
     *
     * @return Tag
     */
    public function handle(): ?Tag
    {
        return Tag::find($this->tag_id);
    }
}
