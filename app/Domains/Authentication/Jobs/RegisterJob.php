<?php

namespace App\Domains\Authentication\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lucid\Units\Job;

class RegisterJob extends Job
{
    private string $name;
    private string $email;
    private string $password;

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
     * @return User
     */
    public function handle() : User
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $user->assignRole('user');

        return $user;
    }
}
