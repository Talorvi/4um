<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Models\User;
use Tests\TestCase;
use App\Domains\User\Jobs\GetUsersJob;

class GetUsersJobTest extends TestCase
{
    public function test_get_users_job()
    {
        User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $job = new GetUsersJob();
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
