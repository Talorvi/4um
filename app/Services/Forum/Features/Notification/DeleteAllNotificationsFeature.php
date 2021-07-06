<?php

namespace App\Services\Forum\Features\Notification;

use App\Domains\Notification\Jobs\DeleteAllNotificationsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeleteAllNotificationsFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(DeleteAllNotificationsJob::class);

        return $this->run(new RespondWithJsonJob([
            'success' => 'Notifications deleted successfully.'
        ]));
    }
}
