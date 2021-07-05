<?php

namespace Tests\Unit\Domains\Notification\Jobs;

use App\Models\Notification;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Notification\Jobs\GetNotificationJob;

class GetNotificationJobTest extends TestCase
{
    public function test_get_notification_job()
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
        $job = new GetNotificationJob($notification->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
