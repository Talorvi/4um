<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Jobs\GetAwaitingPostsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetAwaitingPostsFeature extends Feature
{
    public function handle(Request $request)
    {
        $posts = $this->run(GetAwaitingPostsJob::class);

        return $this->run(new RespondWithJsonJob($posts));
    }
}
