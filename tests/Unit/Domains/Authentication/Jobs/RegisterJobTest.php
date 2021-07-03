<?php

namespace Tests\Unit\Domains\Authentication\Jobs;

use Tests\TestCase;
use App\Domains\Authentication\Jobs\RegisterJob;

class RegisterJobTest extends TestCase
{
    public function test_register_job()
    {
        $job = new RegisterJob('Adam','adam@adam.adam','adamadam');
        $result = $job->handle();
        $this->assertNotNull($result);
    }
}
