<?php

namespace Tests\Unit\Domains\Tag\Jobs;

use App\Models\Tag;
use Tests\TestCase;
use App\Domains\Tag\Jobs\GetTagJob;

class GetTagJobTest extends TestCase
{
    public function test_get_tag_job()
    {
        $tag = Tag::create(['name' => 'Test']);
        $job = new GetTagJob($tag->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_get_non_existing_tag_job()
    {
        $job = new GetTagJob(0);
        $result = $job->handle();
        $this->assertNull($result);
    }
}
