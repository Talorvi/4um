<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\DeleteThreadJob;

class DeleteThreadJobTest extends TestCase
{
    public function test_delete_thread_job()
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
        $job = new DeleteThreadJob($thread->id);
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_delete_non_existent_thread_job()
    {
        $job = new DeleteThreadJob(0);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
