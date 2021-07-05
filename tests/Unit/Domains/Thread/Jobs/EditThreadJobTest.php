<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\EditThreadJob;

class EditThreadJobTest extends TestCase
{
    public function test_edit_thread_job()
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
        $title = 'Test Thread 2';
        $text = 'Test text';
        $job = new EditThreadJob($thread->id,$title,$text);
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_edit_non_existent_thread_job()
    {
        $title = 'Test Thread 2';
        $text = 'Test text';
        $job = new EditThreadJob(0,$title,$text);
        $result = $job->handle();
        $this->assertNull($result);
    }
}
