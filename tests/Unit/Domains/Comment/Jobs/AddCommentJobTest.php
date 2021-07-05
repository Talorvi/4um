<?php

namespace Tests\Unit\Domains\Comment\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Comment\Jobs\AddCommentJob;

class AddCommentJobTest extends TestCase
{
    public function test_add_comment_job()
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
        $job = new AddCommentJob('test',$user,$post->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
