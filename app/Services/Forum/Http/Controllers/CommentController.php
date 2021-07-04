<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Comment\AddCommentFeature;
use App\Services\Forum\Features\Comment\DeleteCommentFeature;
use App\Services\Forum\Features\Comment\EditCommentFeature;
use App\Services\Forum\Features\Comment\GetCommentFeature;
use App\Services\Forum\Features\Comment\GetCommentsFeature;
use Lucid\Units\Controller;

/**
 * @group Comment management
 *
 * APIs for managing comments
 */
class CommentController extends Controller
{
    /**
     * Add comment
     *
     * @bodyParam post_id int required
     * @bodyParam text string required
     *
     * @response {
    "data": {
    "text": "New comment",
    "user_id": 17,
    "post_id": 129,
    "updated_at": "2021-07-04T15:40:17.000000Z",
    "created_at": "2021-07-04T15:40:17.000000Z",
    "id": 29,
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
    "post": {
    "id": 129,
    "user_id": 17,
    "thread_id": 40,
    "text": "I like you a lot",
    "created_at": "2021-07-04T15:39:14.000000Z",
    "updated_at": "2021-07-04T15:39:46.000000Z",
    "deleted_at": null,
    "accepted": 1,
    "number_of_comments": 1,
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
    "comments": [
    {
    "id": 29,
    "text": "New comment",
    "user_id": 17,
    "post_id": 129,
    "created_at": "2021-07-04T15:40:17.000000Z",
    "updated_at": "2021-07-04T15:40:17.000000Z",
    "deleted_at": null,
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
    ]
    }
    ]
    }
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function addComment()
    {
        return $this->serve(AddCommentFeature::class);
    }

    /**
     * Edit comment
     *
     * @bodyParam comment_id int required
     * @bodyParam text string required
     *
     * @response {
    "data": {
    "success": "Comment edited successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function editComment()
    {
        return $this->serve(EditCommentFeature::class);
    }

    /**
     * Delete comment
     *
     * @bodyParam comment_id int required
     *
     * @response {
    "data": {
    "success": "Comment deleted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function deleteComment()
    {
        return $this->serve(DeleteCommentFeature::class);
    }

    /**
     * Get comment
     *
     * @urlParam comment_id int required
     *
     * @response {
    "data": {
    "success": "Comment edited successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getComment()
    {
        return $this->serve(GetCommentFeature::class);
    }

    /**
     * Get comments
     *
     * @response {
    "data": [
    {
    "id": 27,
    "text": "komm",
    "user_id": 23,
    "post_id": 117,
    "created_at": "2021-07-02T18:27:23.000000Z",
    "updated_at": "2021-07-02T18:27:23.000000Z",
    "deleted_at": null,
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
    ]
    },
    {
    "id": 29,
    "text": "Updated comment",
    "user_id": 17,
    "post_id": 129,
    "created_at": "2021-07-04T15:40:17.000000Z",
    "updated_at": "2021-07-04T15:41:41.000000Z",
    "deleted_at": null,
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
    ]
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getComments()
    {
        return $this->serve(GetCommentsFeature::class);
    }
}
