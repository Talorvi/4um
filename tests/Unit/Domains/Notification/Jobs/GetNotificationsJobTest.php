<?php

namespace Tests\Unit\Domains\Notification\Jobs;

use App\Models\Notification;
use App\Models\Thread;
use App\Models\User;
use Tests\TestCase;
use App\Domains\Notification\Jobs\GetNotificationsJob;

class GetNotificationsJobTest extends TestCase
{
    public function test_get_notifications_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $user->assignRole('user');
        $this->actingAs($user);
        $thread = Thread::create([
            'title' => 'Test Thread',
            'text' => 'Test Thread',
            'user_id' => $user->id
        ]);
        Notification::create([
            'message' => 'test',
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);
        $job = new GetNotificationsJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
