<?php

namespace Tests\Unit\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Comment\Jobs\GetCommentsJob;

class GetCommentsJobTest extends TestCase
{
    public function test_get_comments_job()
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
        Comment::create([
            'text' => 'test',
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);
        $job = new GetCommentsJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
