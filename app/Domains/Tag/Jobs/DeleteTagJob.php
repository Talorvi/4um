<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Exception;
use Lucid\Units\Job;

class DeleteTagJob extends Job
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
     * @return bool
     */
    public function handle(): bool
    {
        try {
            Tag::findOrFail($this->tag_id)->delete();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
