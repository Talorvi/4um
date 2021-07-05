<?php

namespace Tests\Unit\Domains\Post\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Post\Jobs\AddPostJob;

class AddPostJobTest extends TestCase
{
    public function test_add_post_job()
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
        $job = new AddPostJob('test',$user,$thread->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
