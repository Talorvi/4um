<?php

namespace App\Services\User\Http\Controllers;

use App\Services\User\Features\GetUserFeature;
use App\Services\User\Features\GetUsersFeature;
use App\Services\User\Features\EditAvatarFeature;
use App\Services\User\Features\EditUserFeature;
use Lucid\Units\Controller;

/**
 * @group User management
 *
 * APIs for managing users
 */
class UserController extends Controller
{
    /**
     * Get user
     * @urlParam user_id int required Example: 25
     *
     * @response {
    "data": {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "number_of_threads_followed": 0,
    "number_of_votes": 0,
    "number_of_comments": 0,
    "avatar_url": "",
    "user_roles": [
    "user"
    ],
    "roles": [
    {
    "id": 9,
    "name": "user",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 25,
    "role_id": 9,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    },
    "status": 200
     * }
     *
     * @response status=400 scenario="user not found" {
    "errors": {
    "user_id": "User could not be printed properly. Check user ID."
    },
    "status": 400
     * }
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->serve(GetUserFeature::class);
    }

    /**
     * Get users
     *
     *
     * @response {
    "data": [
    {
    "id": 24,
    "name": "New Test :)",
    "email": "newtest123@test.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:41:55.000000Z",
    "updated_at": "2021-07-04T11:41:55.000000Z",
    "number_of_threads_followed": 0,
    "number_of_votes": 0,
    "number_of_comments": 0,
    "avatar_url": "",
    "user_roles": [
    "user"
    ],
    "roles": [
    {
    "id": 9,
    "name": "user",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 24,
    "role_id": 9,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    },
    {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "number_of_threads_followed": 0,
    "number_of_votes": 0,
    "number_of_comments": 0,
    "avatar_url": "",
    "user_roles": [
    "user"
    ],
    "roles": [
    {
    "id": 9,
    "name": "user",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 25,
    "role_id": 9,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getUsers()
    {
        return $this->serve(GetUsersFeature::class);
    }

    /**
     * Edit user
     * @bodyParam user_id int required Example: 25
     * @bodyParam password string required Example: bobross25
     * @bodyParam password_confirmation string required Example: bobross25
     *
     * @response {
    "data": {
    "success": "User edited successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function editUser()
    {
        return $this->serve(EditUserFeature::class);
    }

    /**
     * Edit avatar
     * @bodyParam user_id int required Example: 25
     * @bodyParam avatar file required
     *
     * @response {
    "data": {
    "success": "Avatar edited successfully."
    },
    "status": 200
     * }
     * @return mixed
     */
    public function editAvatar()
    {
        return $this->serve(EditAvatarFeature::class);
    }
}
