<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Notification\DeleteNotificationFeature;
use App\Services\Forum\Features\Notification\GetNotificationsFeature;
use Lucid\Units\Controller;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        return $this->serve(GetNotificationsFeature::class);
    }

    public function deleteNotification()
    {
        return $this->serve(DeleteNotificationFeature::class);
    }
}
