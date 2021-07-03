<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Lucid\Units\Job;

class FindOrCreateTagJob extends Job
{
    private string $tag_name;

    /**
     * Create a new job instance.
     *
     * @param string $tag_name
     */
    public function __construct(string $tag_name)
    {
        $this->tag_name = $tag_name;
    }

    /**
     * Execute the job.
     *
     * @return Tag
     */
    public function handle(): Tag
    {
        $tag = Tag::where('name', '=', $this->tag_name)->get()->first();
        if ($tag) {
            return $tag;
        } else {
            $tag = Tag::create([
                'name' => $this->tag_name
            ]);

            return $tag;
        }
    }
}
