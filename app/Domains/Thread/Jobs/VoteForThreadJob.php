<?php

namespace App\Domains\Thread\Jobs;

use App\Models\Thread;
use Exception;
use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class VoteForThreadJob extends Job
{
    private int $thread_id;
    private int $score;

    /**
     * Create a new job instance.
     *
     * @param int $thread_id
     * @param int $score
     */
    public function __construct(int $thread_id, int $score)
    {
        $this->thread_id = $thread_id;
        $this->score = $score;
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

            /**
             * if score is 0 -> removes vote
             * if score is -1 or 1 -> saves to the database
             */
            if ($this->score != 0) {
                $thread->votes()->syncWithoutDetaching([
                    Auth::user()->id => [
                        'value' => $this->score
                    ]
                ]);
            }
            else {
                $thread->votes()->detach([Auth::user()->id]);
            }

            $thread->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
