<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Jobs\AddPostJob;
use App\Domains\Post\Requests\AddPost;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddPostFeature extends Feature
{
    public function handle(AddPost $request)
    {
        $post = $this->run(AddPostJob::class, [
            'text' => $request->input('text'),
            'user' => $request->user(),
            'thread_id' => $request->input('thread_id')
        ]);

        return $this->run(new RespondWithJsonJob($post));
    }
}
