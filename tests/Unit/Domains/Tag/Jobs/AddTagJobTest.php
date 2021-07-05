<?php

namespace Tests\Unit\Domains\Tag\Jobs;

use Tests\TestCase;
use App\Domains\Tag\Jobs\AddTagJob;

class AddTagJobTest extends TestCase
{
    public function test_add_tag_job()
    {
        $job = new AddTagJob('test');
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
