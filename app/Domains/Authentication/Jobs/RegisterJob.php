<?php

namespace App\Domains\Authentication\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lucid\Units\Job;

class RegisterJob extends Job
{
    private $name;
    private $email;
    private $password;

    /**
     * Create a new job instance.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
    }
}
