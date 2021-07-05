<?php

namespace App\Services\Authentication\Http\Controllers;

use App\Services\Authentication\Features\LoginUserFeature;
use App\Services\Authentication\Features\RegisterUserFeature;
use Lucid\Units\Controller;

/**
 * @group Authentication
 *
 * APIs for managing authentication
 */
class AuthenticationController extends Controller
{
    /**
     * Creates a user
     * @bodyParam name string required Name/login of the user. Must be unique. Example: Bob
     * @bodyParam email string required Email of the user. Must be unique. Example: Bob@example.com
     * @bodyParam password string required Password has to be at least 6 characters long. Example: bobross
     * @bodyParam password_confirmation string required This field is required to be the same as the password. Example: bobross
     *
     * @response {
    "data": {
    "name": "Bob",
    "email": "Bob@example.com",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "created_at": "2021-07-04T11:52:21.000000Z",
    "id": 25,
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
     * @unauthenticated
     * @return mixed
     */
    public function registerUser() {
        return $this->serve(RegisterUserFeature::class);
    }

    /**
     * Login user
     *
     * @bodyParam email string required Example: Bob@example.com
     * @bodyParam password string required Example: bobross
     *
     * @response {
    "data": {
    "token": "TOKEN",
    "expires_in": "2022-01-04T12:56:47.000000Z",
    "user": {
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
    },
    "status": 200
     * }
     *
     * @unauthenticated
     * @return mixed
     */
    public function loginUser() {
        return $this->serve(LoginUserFeature::class);
    }
}
