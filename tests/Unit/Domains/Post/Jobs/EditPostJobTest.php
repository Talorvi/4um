<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\EditPostJob;

class EditPostJobTest extends TestCase
{
    public function test_edit_post_job()
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
        $job = new EditPostJob($post->id,'test');
        $result = $job->handle();
        $this->assertTrue($result);
    }
    public function test_edit_ne_post_job()
    {
        $job = new EditPostJob(0,'test');
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
