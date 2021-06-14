<?php

namespace App\Domains\Tag\Jobs;

use App\Models\Tag;
use Lucid\Units\Job;

class AddTagJob extends Job
{
    private string $name;

    /**
     * Create a new job instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Tag::create([
            'name' => $this->name
        ]);
    }
}
