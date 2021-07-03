<?php

namespace Tests\Unit\Domains\Tag\Jobs;

use App\Models\Tag;
use Tests\TestCase;
use App\Domains\Tag\Jobs\FindOrCreateTagJob;

class FindOrCreateTagJobTest extends TestCase
{
    public function test_find_or_create_tag_job()
    {
        $tag = Tag::create(['name' => 'Test']);
        $job = new FindOrCreateTagJob($tag->name);
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_find_or_create_tag_job2()
    {
        $job = new FindOrCreateTagJob('test');
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
