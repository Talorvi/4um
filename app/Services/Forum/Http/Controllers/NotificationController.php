<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Notification\DeleteNotificationFeature;
use App\Services\Forum\Features\Notification\GetNotificationsFeature;
use Lucid\Units\Controller;

/**
 * @group Notification management
 *
 * APIs for managing notifications
 */
class NotificationController extends Controller
{
    /**
     * Get notifications
     *
     * @response {
    "data": [
    {
    "id": 2,
    "message": "Someone commented your post",
    "user_id": 17,
    "thread_id": 7,
    "created_at": "2021-07-02T18:14:27.000000Z",
    "updated_at": "2021-07-02T18:14:27.000000Z"
    },
    {
    "id": 4,
    "message": "Someone added a post to your thread",
    "user_id": 17,
    "thread_id": 33,
    "created_at": "2021-07-02T18:26:25.000000Z",
    "updated_at": "2021-07-02T18:26:25.000000Z"
    },
    {
    "id": 7,
    "message": "Successfully processed the post",
    "user_id": 17,
    "thread_id": 37,
    "created_at": "2021-07-02T19:42:01.000000Z",
    "updated_at": "2021-07-02T19:42:01.000000Z"
    },
    {
    "id": 10,
    "message": "Successfully processed the post",
    "user_id": 17,
    "thread_id": 37,
    "created_at": "2021-07-02T19:45:33.000000Z",
    "updated_at": "2021-07-02T19:45:33.000000Z"
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getNotifications()
    {
        return $this->serve(GetNotificationsFeature::class);
    }

    /**
     * Delete notification
     *
     * @bodyParam notification_id int required ID of the notification to be deleted. Example: 10
     *
     * @response {
    "data": {
    "success": "Notification deleted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function deleteNotification()
    {
        return $this->serve(DeleteNotificationFeature::class);
    }
}
