<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\DeletePostJob;

class DeletePostJobTest extends TestCase
{
    public function test_delete_post_job()
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
            'accepted' => 1
        ]);
        $job = new DeletePostJob($post->id);
        $result = $job->handle();
        $this->assertTrue($result);
    }
    public function test_delete_ne_post_job()
    {
        $job = new DeletePostJob(0);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
