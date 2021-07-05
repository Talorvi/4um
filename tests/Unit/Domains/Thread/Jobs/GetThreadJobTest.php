<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\GetThreadJob;

class GetThreadJobTest extends TestCase
{
    public function test_get_thread_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $thread = Thread::create([
            'title' => 'Test Thread',
            'text' => 'Test Thread',
            'user_id' => $user->id
        ]);
        $job = new GetThreadJob($thread->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
    public function test_get_non_existent_thread_job()
    {
        $job = new GetThreadJob(0);
        $result = $job->handle();
        $this->assertNull($result);
    }
}
