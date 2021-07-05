<?php

namespace Tests\Unit\Domains\Notification\Jobs;

use App\Models\Notification;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Notification\Jobs\DeleteNotificationJob;

class DeleteNotificationJobTest extends TestCase
{
    public function test_delete_notification_job()
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
        $notification = Notification::create([
            'message' => 'test',
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);
        $job = new DeleteNotificationJob($notification->id);
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_delete_non_existent_notification_job()
    {
        $job = new DeleteNotificationJob(0);
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
