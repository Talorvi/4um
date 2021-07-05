<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\GetAwaitingPostsJob;

class GetAwaitingPostsJobTest extends TestCase
{
    public function test_get_awaiting_posts_job()
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
        $job = new GetAwaitingPostsJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
