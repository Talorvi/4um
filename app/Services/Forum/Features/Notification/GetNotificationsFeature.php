<?php

namespace App\Services\Forum\Features\Notification;

use App\Domains\Notification\Jobs\GetNotificationsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetNotificationsFeature extends Feature
{
    public function handle(Request $request)
    {
        $notifications = $this->run(GetNotificationsJob::class);

        return $this->run(new RespondWithJsonJob($notifications));
    }
}
