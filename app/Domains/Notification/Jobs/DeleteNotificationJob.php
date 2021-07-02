<?php

namespace App\Domains\Notification\Jobs;

use App\Models\Notification;
use Exception;
use Lucid\Units\Job;

class DeleteNotificationJob extends Job
{
    private int $notification_id;

    /**
     * Create a new job instance.
     *
     * @param int $notification_id
     */
    public function __construct(int $notification_id)
    {
        $this->notification_id = $notification_id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        try {
            Notification::findOrFail($this->notification_id)->delete();
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
