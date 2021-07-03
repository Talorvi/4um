<?php

namespace Tests\Unit\Domains\Tag\Jobs;

use App\Models\Tag;
use Tests\TestCase;
use App\Domains\Tag\Jobs\GetTagsJob;

class GetTagsJobTest extends TestCase
{
    public function test_get_tags_job()
    {
        Tag::create(['name' => 'Test']);
        $job = new GetTagsJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
