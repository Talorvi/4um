<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Exception;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class FollowThreadJob extends Job
{
    private int $thread_id;
    private bool $follow;

    /**
     * Create a new job instance.
     *
     * @param int $thread_id
     * @param bool $follow
     */
    public function __construct(int $thread_id, bool $follow)
    {
        $this->thread_id = $thread_id;
        $this->follow = $follow;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            $thread = Thread::findOrFail($this->thread_id);

            if ($this->follow) {
                $thread->followers()->syncWithoutDetaching([Auth::user()->id]);
            }
            else {
                $thread->followers()->detach([Auth::user()->id]);
            }

            $thread->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
