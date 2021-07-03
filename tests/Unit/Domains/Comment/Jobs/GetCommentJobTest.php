<?php

namespace Tests\Unit\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Comment\Jobs\GetCommentJob;

class GetCommentJobTest extends TestCase
{
    public function test_get_comment_job()
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
        $comment = Comment::create([
            'text' => 'test',
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);
        $job = new GetCommentJob($comment->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_get_ne_comment_job()
    {
        $job = new GetCommentJob(0);
        $result = $job->handle();
        $this->assertNull($result);
    }
}
