<?php

namespace App\Domains\Notification\Jobs;

use App\Models\Notification;
use Lucid\Units\Job;

class GetNotificationJob extends Job
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
     * @return Notification
     */
    public function handle(): ?Notification
    {
        return Notification::find($this->notification_id);
    }
}
