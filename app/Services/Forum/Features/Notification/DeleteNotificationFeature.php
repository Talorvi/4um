<?php

namespace App\Services\Forum\Features\Notification;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Notification\Jobs\DeleteNotificationJob;
use App\Domains\Notification\Requests\DeleteNotification;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeleteNotificationFeature extends Feature
{
    public function handle(DeleteNotification $request)
    {
        $result = $this->run(DeleteNotificationJob::class, [
            'notification_id' => $request->input('notification_id')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Notification deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Notification could not be deleted properly. Check notification ID.'
        ]));
    }
}
