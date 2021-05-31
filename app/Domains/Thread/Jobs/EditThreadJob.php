<?php

namespace App\Domains\Thread\Jobs;

use App\Data\Thread;
use Exception;
use Lucid\Units\Job;

class EditThreadJob extends Job
{
    private int $thread_id;
    private ?string $title;
    private ?string $text;

    /**
     * Create a new job instance.
     *
     * @param int $thread_id
     * @param string|null $title
     * @param string|null $text
     */
    public function __construct(int $thread_id, ?string $title = null, ?string $text = null)
    {
        $this->thread_id = $thread_id;
        $this->title = $title;
        $this->text = $text;
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
            if ($this->title) {
                $thread->title = $this->title;
            }
            if ($this->text) {
                $thread->text = $this->text;
            }
            $thread->save();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
