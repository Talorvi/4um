<?php

namespace Tests\Unit\Domains\Thread\Jobs;

use App\Models\User;
use Tests\TestCase;
use App\Domains\Thread\Jobs\AddThreadJob;

class AddThreadJobTest extends TestCase
{
    public function test_add_thread_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $job = new AddThreadJob("Test", "test", $user);
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
