<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Models\User;
use Tests\TestCase;
use App\Domains\User\Jobs\EditUserJob;

class UpdateUserJobTest extends TestCase
{
    public function test_update_existing_user_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $job = new EditUserJob($user->id, "adamadam");
        $result = $job->handle();
        $this->assertTrue($result);
    }

    public function test_update_non_existing_user_job()
    {
        $job = new EditUserJob(-20, "adamadam");
        $result = $job->handle();
        $this->assertFalse($result);
    }
}
