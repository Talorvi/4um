<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Thread\AddThreadFeature;
use App\Services\Forum\Features\Thread\DeleteThreadFeature;
use App\Services\Forum\Features\Thread\EditThreadFeature;
use App\Services\Forum\Features\Thread\FollowThreadFeature;
use App\Services\Forum\Features\Thread\GetFollowedThreadsFeature;
use App\Services\Forum\Features\Thread\GetThreadFeature;
use App\Services\Forum\Features\Thread\GetThreadsFeature;
use App\Services\Forum\Features\Thread\VoteForThreadFeature;
use Lucid\Units\Controller;

/**
 * @group Thread management
 *
 * APIs for managing threads
 */
class ThreadController extends Controller
{
    /**
     * Add thread
     *
     * Responds with created Thread and User that posted this thread
     *
     * @bodyParam title string required Title of the thread
     * @bodyParam text string required The content of the thread
     * @bodyParam tags string[] Array of tags (strings)
     *
     * @response {
    "data": {
    "title": "New post",
    "text": "New post :)",
    "user_id": 25,
    "updated_at": "2021-07-04T14:32:53.000000Z",
    "created_at": "2021-07-04T14:32:53.000000Z",
    "id": 39,
    "number_of_followers": 0,
    "score": 0,
    "number_of_posts": 0,
    "tags": [
    {
    "name": "tag1"
    },
    {
    "name": "tag2"
    }
    ],
    "followers": [],
    "votes": [],
    "author": [
    {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "avatar_url": "http://www.4um.polarlooptheory.pl/storage/45/phpPPQ0gJ",
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
    ]
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function addThread()
    {
        return $this->serve(AddThreadFeature::class);
    }

    /**
     * Edit thread
     *
     * @bodyParam thread_id int required
     * @bodyParam title string
     * @bodyParam text string
     * @bodyParam tags string[]
     *
     * @response {
    "data": {
    "success": "Thread edited successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function editThread()
    {
        return $this->serve(EditThreadFeature::class);
    }

    /**
     * Delete thread
     *
     * @bodyParam thread_id int required
     *
     * @response {
    "data": {
    "success": "Thread deleted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function deleteThread()
    {
        return $this->serve(DeleteThreadFeature::class);
    }

    /**
     * Get thread
     *
     * @urlParam thread_id int required Example: 40
     *
     * @response {
    "data": {
    "id": 40,
    "user_id": 25,
    "title": "New post",
    "text": "New post :)",
    "created_at": "2021-07-04T14:37:48.000000Z",
    "updated_at": "2021-07-04T14:37:48.000000Z",
    "deleted_at": null,
    "number_of_followers": 0,
    "score": 0,
    "number_of_posts": 0,
    "tags": [
    {
    "id": 10,
    "name": "tag1",
    "created_at": "2021-06-20T12:01:33.000000Z",
    "updated_at": "2021-06-20T12:01:33.000000Z"
    },
    {
    "id": 20,
    "name": "tag2",
    "created_at": "2021-07-04T14:32:29.000000Z",
    "updated_at": "2021-07-04T14:32:29.000000Z"
    }
    ],
    "followers": [],
    "votes": [],
    "author": [
    {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "avatar_url": "http://www.4um.polarlooptheory.pl/storage/45/phpPPQ0gJ",
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
    "posts": []
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getThread()
    {
        return $this->serve(GetThreadFeature::class);
    }

    /**
     * Get threads
     *
     * @response {
    "data": [
    {
    "id": 38,
    "user_id": 17,
    "title": "New post",
    "text": "New post :)",
    "created_at": "2021-07-04T14:32:29.000000Z",
    "updated_at": "2021-07-04T14:32:29.000000Z",
    "deleted_at": null,
    "number_of_followers": 0,
    "score": 0,
    "number_of_posts": 0,
    "tags": [
    {
    "name": "tag1"
    },
    {
    "name": "tag2"
    }
    ],
    "followers": [],
    "votes": [],
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
    },
    {
    "id": 40,
    "user_id": 25,
    "title": "New post",
    "text": "New post :)",
    "created_at": "2021-07-04T14:37:48.000000Z",
    "updated_at": "2021-07-04T14:37:48.000000Z",
    "deleted_at": null,
    "number_of_followers": 0,
    "score": 0,
    "number_of_posts": 0,
    "tags": [
    {
    "name": "tag1"
    },
    {
    "name": "tag2"
    }
    ],
    "followers": [],
    "votes": [],
    "author": [
    {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/45/phpPPQ0gJ",
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
    ]
    }
    ],
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getThreads()
    {
        return $this->serve(GetThreadsFeature::class);
    }

    /**
     * Get followed threads
     *
     * @response {
    "data": [
    {
    "id": 30,
    "user_id": 17,
    "title": "New post",
    "text": "New post :)",
    "created_at": "2021-06-20T12:04:36.000000Z",
    "updated_at": "2021-06-20T12:04:36.000000Z",
    "deleted_at": null,
    "number_of_followers": 1,
    "score": 1,
    "number_of_posts": 4,
    "tags": [],
    "followers": [
    {
    "name": "Mr Sandman",
    "user_id": 17,
    "avatar_url": "",
    "user_roles": [],
    "roles": []
    }
    ],
    "votes": [
    {
    "name": "Mr Sandman",
    "user_roles": [],
    "pivot": {
    "thread_id": 30,
    "user_id": 17,
    "value": 1,
    "created_at": "2021-06-28T13:36:49.000000Z",
    "updated_at": "2021-06-28T13:36:49.000000Z"
    },
    "roles": []
    }
    ],
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
    "pivot": {
    "user_id": 17,
    "thread_id": 30,
    "created_at": "2021-06-29T13:27:07.000000Z",
    "updated_at": "2021-06-29T13:27:07.000000Z"
    }
    },
    {
    "id": 32,
    "user_id": 17,
    "title": "thread bez tagow",
    "text": "no totalnie bez",
    "created_at": "2021-06-20T12:24:00.000000Z",
    "updated_at": "2021-06-20T12:24:00.000000Z",
    "deleted_at": null,
    "number_of_followers": 1,
    "score": -3,
    "number_of_posts": 1,
    "tags": [],
    "followers": [
    {
    "name": "Mr Sandman",
    "user_id": 17,
    "avatar_url": "",
    "user_roles": [],
    "roles": []
    }
    ],
    "votes": [
    {
    "name": "jacek123",
    "user_roles": [],
    "pivot": {
    "thread_id": 32,
    "user_id": 22,
    "value": -1,
    "created_at": "2021-06-28T12:57:27.000000Z",
    "updated_at": "2021-06-28T12:57:27.000000Z"
    },
    "roles": []
    },
    {
    "name": "Mr Sandman",
    "user_roles": [],
    "pivot": {
    "thread_id": 32,
    "user_id": 17,
    "value": -1,
    "created_at": "2021-06-30T12:17:25.000000Z",
    "updated_at": "2021-06-30T12:17:25.000000Z"
    },
    "roles": []
    },
    {
    "name": "Kot Bonifacy",
    "user_roles": [],
    "pivot": {
    "thread_id": 32,
    "user_id": 23,
    "value": -1,
    "created_at": "2021-07-02T18:33:18.000000Z",
    "updated_at": "2021-07-02T18:33:18.000000Z"
    },
    "roles": []
    }
    ],
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
    "pivot": {
    "user_id": 17,
    "thread_id": 32,
    "created_at": "2021-07-02T18:23:42.000000Z",
    "updated_at": "2021-07-02T18:23:42.000000Z"
    }
    },
    {
    "id": 40,
    "user_id": 25,
    "title": "New post",
    "text": "New post :)",
    "created_at": "2021-07-04T14:37:48.000000Z",
    "updated_at": "2021-07-04T14:37:48.000000Z",
    "deleted_at": null,
    "number_of_followers": 1,
    "score": 0,
    "number_of_posts": 0,
    "tags": [
    {
    "name": "tag1"
    },
    {
    "name": "tag2"
    }
    ],
    "followers": [
    {
    "name": "Mr Sandman",
    "user_id": 17,
    "avatar_url": "",
    "user_roles": [],
    "roles": []
    }
    ],
    "votes": [],
    "author": [
    {
    "id": 25,
    "name": "Bob",
    "email": "Bob@example.com",
    "email_verified_at": null,
    "created_at": "2021-07-04T11:52:21.000000Z",
    "updated_at": "2021-07-04T11:52:21.000000Z",
    "avatar_url": "https://www.4um.polarlooptheory.pl/storage/45/phpPPQ0gJ",
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
    "pivot": {
    "user_id": 17,
    "thread_id": 40,
    "created_at": "2021-07-04T14:50:27.000000Z",
    "updated_at": "2021-07-04T14:50:27.000000Z"
    }
    }
    ],
    "status": 200
     * }
     * @return mixed
     */
    public function getFollowedThreads()
    {
        return $this->serve(GetFollowedThreadsFeature::class);
    }

    /**
     * Follow thread
     *
     * @bodyParam thread_id int required
     * @bodyParam follow int required This can be either 0 or 1. 1 means that user will follow thread, 0 is for unfollow.
     *
     * @response {
    "data": {
    "success": "Thread (un)followed successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function followThread()
    {
        return $this->serve(FollowThreadFeature::class);
    }

    /**
     * Vote for thread
     *
     * Votes for a thread - score is:
     * - 0 is for removing vote
     * - 1 is for upvoting
     * - -1 is for downvoting
     *
     * @bodyParam thread_id int required
     * @bodyParam score int required Example: 1
     *
     * @response {
    "data": {
    "success": "Voted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function voteForThread()
    {
        return $this->serve(VoteForThreadFeature::class);
    }
}
