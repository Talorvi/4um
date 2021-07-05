<?php

namespace Tests\Unit\Domains\Comment\Jobs;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Comment\Jobs\DeleteCommentJob;

class DeleteCommentJobTest extends TestCase
{
    public function test_delete_comment_job()
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
        $job = new DeleteCommentJob($comment->id);
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_delete_ne_comment_job()
    {
        $job = new DeleteCommentJob(0);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
