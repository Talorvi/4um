<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Contracts\Auth\Authenticatable;
use Lucid\Units\Job;

class LoginJob extends Job
{
    private string $email;
    private string $password;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return Authenticatable
     */
    public function handle(): ?Authenticatable
    {
        if (!auth()->attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            return null;
        }

        return auth()->user();
    }
}
