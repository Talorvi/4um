<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Lucid\Units\Job;

class EditUserJob extends Job
{
    private int $user_id;
    private string $password;

    /**
     * Create a new job instance.
     *
     * @param int $user_id
     * @param string $password
     */
    public function __construct(int $user_id, string $password)
    {
        $this->user_id = $user_id;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            $user = User::findOrFail($this->user_id);
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
            $user->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
