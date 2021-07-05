<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\AcceptPostJob;

class AcceptPostJobTest extends TestCase
{
    public function test_accept_post_job()
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
        $post = Post::create([
            'text' => 'test',
            'user_id' => $user->id,
            'thread_id' => $thread->id,
            'accepted' => 0
        ]);
        $job = new AcceptPostJob($post->id, true);
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_deny_post_job()
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
        $post = Post::create([
            'text' => 'test',
            'user_id' => $user->id,
            'thread_id' => $thread->id,
            'accepted' => 0
        ]);
        $job = new AcceptPostJob($post->id, false);
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_accept_ne_post_job()
    {
        $job = new AcceptPostJob(0,true);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
