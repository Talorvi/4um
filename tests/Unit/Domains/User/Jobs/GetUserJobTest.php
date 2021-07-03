<?php

namespace Tests\Unit\Domains\User\Jobs;

use Tests\TestCase;
use App\Domains\User\Jobs\GetUserJob;
use App\Models\User;

class GetUserJobTest extends TestCase
{
    public function test_get_existing_user_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $job = new GetUserJob($user->id);
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_get_non_existing_user_job()
    {
        $job = new GetUserJob(-50);
        $user = $job->handle();
        $this->assertNull($user);
    }
}
