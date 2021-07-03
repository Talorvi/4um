<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\GetFollowedThreadsJob;

class GetFollowedThreadsJobTest extends TestCase
{
    public function test_get_followed_threads_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $user->assignRole('user');
        $this->actingAs($user);
        $job = new GetFollowedThreadsJob();
        $result = $job->handle();
        $this->assertEmpty($result);
    }
}
