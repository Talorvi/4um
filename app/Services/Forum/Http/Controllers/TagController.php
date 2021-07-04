<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Tag\AddTagFeature;
use App\Services\Forum\Features\Tag\DeleteTagFeature;
use App\Services\Forum\Features\Tag\GetTagFeature;
use App\Services\Forum\Features\Tag\GetTagsFeature;
use Lucid\Units\Controller;

/**
 * @group Tag management
 *
 * APIs for managing tags
 */
class TagController extends Controller
{
    /**
     * Add tag
     * @bodyParam name string required Example: "new tag"
     *
     * @response {
    "data": {
    "name": "new tag",
    "updated_at": "2021-07-04T12:51:51.000000Z",
    "created_at": "2021-07-04T12:51:51.000000Z",
    "id": 19
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function addTag()
    {
        return $this->serve(AddTagFeature::class);
    }

    /**
     * Delete tag
     * @bodyParam tag_id int required Example: 6
     *
     * @response {
    "data": {
    "success": "Tag deleted successfully."
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function deleteTag()
    {
        return $this->serve(DeleteTagFeature::class);
    }

    /**
     * Get tag
     * @urlParam tag_id int Example: 6
     *
     * @response {
    "data": {
    "id": 6,
    "name": "tag2",
    "created_at": "2021-06-20T09:58:48.000000Z",
    "updated_at": "2021-06-20T09:58:48.000000Z"
    },
    "status": 200
     * }
     *
     * @return mixed
     */
    public function getTag()
    {
        return $this->serve(GetTagFeature::class);
    }

    /**
     * Get tags
     *
     * @response {
    "data": [
    {
    "id": 9,
    "name": "tag",
    "created_at": "2021-06-20T12:01:15.000000Z",
    "updated_at": "2021-06-20T12:01:15.000000Z"
    },
    {
    "id": 10,
    "name": "tag1",
    "created_at": "2021-06-20T12:01:33.000000Z",
    "updated_at": "2021-06-20T12:01:33.000000Z"
    }
    ],
    "status": 200
     * }
     * @return mixed
     */
    public function getTags()
    {
        return $this->serve(GetTagsFeature::class);
    }
}
