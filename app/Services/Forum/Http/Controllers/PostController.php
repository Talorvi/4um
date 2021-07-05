<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Post\AcceptPostFeature;
use App\Services\Forum\Features\Post\AddPostFeature;
use App\Services\Forum\Features\Post\DeletePostFeature;
use App\Services\Forum\Features\Post\EditPostFeature;
use App\Services\Forum\Features\Post\GetAwaitingPostsFeature;
use App\Services\Forum\Features\Post\GetPostFeature;
use App\Services\Forum\Features\Post\GetPostsFeature;
use Lucid\Units\Controller;

/**
 * @group Post management
 *
 * APIs for managing posts
 */
class PostController extends Controller
{
    /**
     * Add post
     *
     * This endpoint works asynchronous. It goes into queue.
     * When the job is done, user receives a notification.
     *
     * @bodyParam thread_id int required
     * @bodyParam text string required
     *
     * @response {
    "data": {
    "text": "I like your thread",
    "user_id": 17,
    "thread_id": 40,
    "accepted": 0,
    "updated_at": "2021-07-04T15:11:14.000000Z",
    "created_at": "2021-07-04T15:11:14.000000Z",
    "id": 126,
    "number_of_comments": 0,
    "author": [
    {
    "id": 17,
    "name": "Mr Sandman",
    "email": "test@test.com",
    "email_verified_at": null,
    "created_at": "2021-05-17T19:59:06.000000Z",
    "updated_at": "2021-07-04T12:26:09.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/43/phpcjJdT2",
    "user_roles": [
    "admin"
    ],
    "roles": [
    {
    "id": 7,
    "name": "admin",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 17,
    "role_id": 7,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function addPost()
    {
        return $this->serve(AddPostFeature::class);
    }

    /**
     * Edit post
     *
     * @bodyParam post_id int required
     *
     * @response {
    "data": {
    "success": "Post edited successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function editPost()
    {
        return $this->serve(EditPostFeature::class);
    }

    /**
     * Delete post
     *
     * @bodyParam post_id int required
     *
     * @response {
    "data": {
    "success": "Post deleted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function deletePost()
    {
        return $this->serve(DeletePostFeature::class);
    }

    /**
     * Get post
     *
     * @bodyParam post_id int required
     *
     * @response {
    "data": {
    "id": 126,
    "user_id": 17,
    "thread_id": 40,
    "text": "Updated first post",
    "created_at": "2021-07-04T15:11:14.000000Z",
    "updated_at": "2021-07-04T15:12:23.000000Z",
    "deleted_at": null,
    "accepted": 0,
    "number_of_comments": 0,
    "author": [
    {
    "id": 17,
    "name": "Mr Sandman",
    "email": "test@test.com",
    "email_verified_at": null,
    "created_at": "2021-05-17T19:59:06.000000Z",
    "updated_at": "2021-07-04T12:26:09.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/43/phpcjJdT2",
    "user_roles": [
    "admin"
    ],
    "roles": [
    {
    "id": 7,
    "name": "admin",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 17,
    "role_id": 7,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->serve(GetPostFeature::class);
    }

    /**
     * Get posts
     *
     * @response {
    "data": [
    {
    "id": 119,
    "user_id": 17,
    "thread_id": 37,
    "text": "I like your thread",
    "created_at": "2021-07-02T19:45:23.000000Z",
    "updated_at": "2021-07-02T19:45:33.000000Z",
    "deleted_at": null,
    "accepted": 1,
    "number_of_comments": 0,
    "author": [
    {
    "id": 17,
    "name": "Mr Sandman",
    "email": "test@test.com",
    "email_verified_at": null,
    "created_at": "2021-05-17T19:59:06.000000Z",
    "updated_at": "2021-07-04T12:26:09.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/43/phpcjJdT2",
    "user_roles": [
    "admin"
    ],
    "roles": [
    {
    "id": 7,
    "name": "admin",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 17,
    "role_id": 7,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    },
    {
    "id": 123,
    "user_id": 23,
    "thread_id": 37,
    "text": "test",
    "created_at": "2021-07-02T19:54:30.000000Z",
    "updated_at": "2021-07-02T19:54:39.000000Z",
    "deleted_at": null,
    "accepted": 1,
    "number_of_comments": 0,
    "author": [
    {
    "id": 23,
    "name": "Kot Bonifacy",
    "email": "bonifacy@test.com",
    "email_verified_at": null,
    "created_at": "2021-07-02T18:24:20.000000Z",
    "updated_at": "2021-07-02T18:24:20.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/44/php5TgEjW",
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
    "model_id": 23,
    "role_id": 9,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getPosts()
    {
        return $this->serve(GetPostsFeature::class);
    }

    /**
     * Accept post
     *
     * For accepted = 1 accepts the post, for 0, deletes the post
     *
     * @bodyParam post_id int required
     * @bodyParam accepted int required Example: 1
     *
     * @response {
    "data": {
    "success": "Post has been processed."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function acceptPost()
    {
        return $this->serve(AcceptPostFeature::class);
    }

    /**
     * Get awaiting posts
     *
     * @response {
     *     "data": [
    {
    "id": 126,
    "user_id": 17,
    "thread_id": 40,
    "text": "Updated first post",
    "created_at": "2021-07-04T15:11:14.000000Z",
    "updated_at": "2021-07-04T15:12:23.000000Z",
    "deleted_at": null,
    "accepted": 0,
    "number_of_comments": 0,
    "author": [
    {
    "id": 17,
    "name": "Mr Sandman",
    "email": "test@test.com",
    "email_verified_at": null,
    "created_at": "2021-05-17T19:59:06.000000Z",
    "updated_at": "2021-07-04T12:26:09.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/43/phpcjJdT2",
    "user_roles": [
    "admin"
    ],
    "roles": [
    {
    "id": 7,
    "name": "admin",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 17,
    "role_id": 7,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    },
    {
    "id": 127,
    "user_id": 17,
    "thread_id": 40,
    "text": "I hate you",
    "created_at": "2021-07-04T15:21:50.000000Z",
    "updated_at": "2021-07-04T15:21:50.000000Z",
    "deleted_at": null,
    "accepted": 0,
    "number_of_comments": 0,
    "author": [
    {
    "id": 17,
    "name": "Mr Sandman",
    "email": "test@test.com",
    "email_verified_at": null,
    "created_at": "2021-05-17T19:59:06.000000Z",
    "updated_at": "2021-07-04T12:26:09.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/43/phpcjJdT2",
    "user_roles": [
    "admin"
    ],
    "roles": [
    {
    "id": 7,
    "name": "admin",
    "guard_name": "web",
    "created_at": "2021-06-05T16:44:16.000000Z",
    "updated_at": "2021-06-05T16:44:16.000000Z",
    "pivot": {
    "model_id": 17,
    "role_id": 7,
    "model_type": "App\\Models\\User"
    }
    }
    ]
    }
    ],
    "comments": []
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getAwaitingPosts()
    {
        return $this->serve(GetAwaitingPostsFeature::class);
    }
}
