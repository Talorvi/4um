<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\FollowThreadJob;

class FollowThreadJobTest extends TestCase
{
    public function test_follow_thread_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $user->assignRole('user');
        $this->actingAs($user);
        $thread = Thread::create([
            'title' => 'Test Thread',
            'text' => 'Test Thread',
            'user_id' => $user->id
        ]);
        $job = new FollowThreadJob($thread->id, true);
        $result = $job->handle();
        $this->assertTrue($result);
    }
    public function test_follow_non_existent_thread_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $user->assignRole('user');
        $this->actingAs($user);
        $job = new FollowThreadJob(0, true);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
