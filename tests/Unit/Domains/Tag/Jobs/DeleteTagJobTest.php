<?php

namespace Tests\Unit\Domains\Tag\Jobs;

use App\Models\Tag;
use Tests\TestCase;
use App\Domains\Tag\Jobs\DeleteTagJob;

class DeleteTagJobTest extends TestCase
{
    public function test_delete_tag_job()
    {
        $tag = Tag::create(['name' => 'Test']);
        $job = new DeleteTagJob($tag->id);
        $result = $job->handle();
        $this->assertTrue($result);
    }
    public function test_delete_non_existent_tag_job()
    {
        $job = new DeleteTagJob(0);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
