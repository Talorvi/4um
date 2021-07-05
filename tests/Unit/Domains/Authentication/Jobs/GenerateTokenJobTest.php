<?php

namespace Tests\Unit\Domains\Authentication\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Domains\Authentication\Jobs\GenerateTokenJob;

class GenerateTokenJobTest extends TestCase
{
    public function test_generate_token_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => Hash::make('adamadam')
        ]);
        $job = new GenerateTokenJob($user);
        $result = $job->handle();
        $this->assertNotEmpty($result);
    }
}
