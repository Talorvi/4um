<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\GetThreadsJob;

class GetThreadsJobTest extends TestCase
{
    public function test_get_threads_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        Thread::create([
            'title' => 'Test Thread',
            'text' => 'Test Thread',
            'user_id' => $user->id
        ]);
        $job = new GetThreadsJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
    public function test_get_empty_threads_job()
    {
        $job = new GetThreadsJob();
        $result = $job->handle();
        $this->assertEmpty($result);
    }
}
