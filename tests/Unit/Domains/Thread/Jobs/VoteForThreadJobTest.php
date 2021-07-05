<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\VoteForThreadJob;

class VoteForThreadJobTest extends TestCase
{
    public function test_vote_for_thread_job()
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
        $job = new VoteForThreadJob($thread->id,1);
        $result = $job->handle();
        $this->assertTrue($result);
    }
    public function test_vote_for_non_existing_thread_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $user->assignRole('user');
        $this->actingAs($user);
        $job = new VoteForThreadJob(0,1);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
