<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Requests\AddPost;
use App\Services\Forum\Operations\AddPostOperation;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddPostFeature extends Feature
{
    public function handle(AddPost $request)
    {
        $post = $this->run(AddPostOperation::class, [
            'request' => $request
        ]);

        /** @noinspection PhpParamsInspection */
        return $this->run(new RespondWithJsonJob($post));
    }
}
