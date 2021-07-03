<?php

namespace Tests\Unit\Domains\Authentication\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Domains\Authentication\Jobs\LoginJob;

class LoginJobTest extends TestCase
{
    public function test_login_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => Hash::make('adamadam')
        ]);
        $job = new LoginJob($user->email, 'adamadam');
        $result = $job->handle();
        $this->assertNotNull($result);
    }

    public function test_wrong_login_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $job = new LoginJob($user->email, '');
        $result = $job->handle();
        $this->assertNull($result);
    }
}
