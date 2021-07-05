<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Jobs\GetPostsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetPostsFeature extends Feature
{
    public function handle(Request $request)
    {
        $posts = $this->run(GetPostsJob::class);

        return $this->run(new RespondWithJsonJob($posts));
    }
}
