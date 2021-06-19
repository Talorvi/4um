<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Jobs\AddPostJob;
use App\Domains\Post\Requests\AddPost;
use App\Jobs\ProcessPost;
use App\Services\Forum\Operations\AddPostOperation;
use Illuminate\Support\Facades\Log;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddPostFeature extends Feature
{
    public function handle(AddPost $request)
    {
        $post = $this->run(AddPostOperation::class, [
            'request' => $request
        ]);

        return $this->run(new RespondWithJsonJob($post));
    }
}
