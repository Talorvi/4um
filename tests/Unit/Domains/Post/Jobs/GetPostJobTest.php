<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\GetPostJob;

class GetPostJobTest extends TestCase
{
    public function test_get_post_job()
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
        $job = new GetPostJob($post->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
    public function test_get_ne_post_job()
    {
        $job = new GetPostJob(0);
        $result = $job->handle();
        $this->assertNull($result);
    }
}
